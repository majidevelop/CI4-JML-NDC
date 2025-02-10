<?php
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\MemberModel;
class MemberController extends Controller
{
    public function listMembers()
    {
        // $memberModel = new MemberModel();
        // $members = $memberModel->findAll();

        $db = \Config\Database::connect();
        $builder = $db->table('members');
        $builder->select('members.*, locations.LocationName as taluk_name');
        $builder->join('locations', 'members.taluk = locations.ID', 'left'); // Left join to include members with no taluk set
        $members = $builder->get()->getResultArray();
        return view('member/list_members', ['members' => $members]);
    }

    public function viewMember($id)
    {
        // $memberModel = new MemberModel();
        // $member = $memberModel->find($id);

        $db = \Config\Database::connect();
        $builder = $db->table('members');
        $builder->select('members.*, locations.LocationName as taluk_name');
        $builder->join('locations', 'members.taluk = locations.ID', 'left'); // Left join to get taluk name
        $builder->where('members.id', $id);
        $member = $builder->get()->getRowArray();

        if (!$member) {
            return redirect()->to('/members')->with('error', 'Member not found!');
        }

        return view('member/view_member', ['member' => $member]);
    }
    public function register()
    {
         // Handle form submission
        //  echo "Form submitted!";
        //  die();
        $db = \Config\Database::connect();
        $validation = \Config\Services::validation();

        $validation->setRules([
            'name' => 'required|min_length[3]|max_length[100]',
            'mobile' => 'required|exact_length[10]|numeric',
            'email' => 'required|valid_email',
            'address' => 'required',
            'state' => 'required',
            // 'district' => 'required',
            'pin' => 'required|exact_length[6]|numeric',
            'taluk' => 'required',
            'blood' => 'required',
            'aadhar' => 'required|exact_length[12]|numeric',
            'photo' => 'uploaded[photo]|max_size[photo,2048]|is_image[photo]|mime_in[photo,image/jpg,image/jpeg,image/png]',
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        // File handling
        $file = $this->request->getFile('photo');
        if ($file->isValid() && !$file->hasMoved()) {
            $newFileName = $file->getRandomName();
            $file->move(FCPATH . 'uploads', $newFileName);
        } else {
            return redirect()->back()->with('error', 'Photo upload failed.');
        }

        // Insert data into the database
        $data = [
            'name' => $this->request->getPost('name'),
            'mobile' => $this->request->getPost('mobile'),
            'email' => $this->request->getPost('email'),
            'address' => $this->request->getPost('address'),
            'state' => $this->request->getPost('state'),
            'district' => $this->request->getPost('district'),
            'pin' => $this->request->getPost('pin'),
            'taluk' => $this->request->getPost('taluk'),
            'panchayath' => "NA",//$this->request->getPost('panchayath'),
            'photo' => $newFileName,
            'aadhar' => $this->request->getPost('aadhar'),
            'blood' => $this->request->getPost('blood'),

        ];

        $builder = $db->table('members');
        if ($builder->insert($data)) {
            $insertedId = $db->insertID(); // Get the last inserted ID
            // Store submitted data and inserted ID in session
            $data['id'] = $insertedId; 
            // Store submitted data in session and redirect to success page
            session()->set('submittedData', $data);

            $submittedData = session()->get('submittedData');
            $talukId = $submittedData['taluk']; // Get the taluk ID from session data
            $bloodId = $submittedData['blood'];
            $id = $submittedData['id'];
            // Load the database
            $db = \Config\Database::connect();
            // Fetch the taluk name from the locations table
            $query = $db->table('locations')
                        ->select('LocationName, RTOCodes') // Assuming column name is 'taluk_name'
                        ->where('ID', $talukId)
                        ->get();
                        $talukName = $query->getRow() ? $query->getRow()->LocationName : 'Unknown';
                        $rtoCode =  $query->getRow() ? $query->getRow()->RTOCodes : 'Unknown';
            
            $rtoCode = str_replace(['-', ' '], '', $rtoCode); // Remove dashes and spaces
            $formattedId = str_pad($id, 4, '0', STR_PAD_LEFT); // Make ID 4 digits (e.g., 1 → 0001)
            $firstThreeLetters = $this->getFilteredTalukCode($talukName);
            $membershipID = $rtoCode.$firstThreeLetters.$formattedId;

            // echo $membershipID;
            // Fetch the taluk name from the locations table
            $query = $db->table('blood_groups')
                        ->select('name') // Assuming column name is 'taluk_name'
                        ->where('id', $bloodId)
                        ->get();
            $bloodName = $query->getRow() ? $query->getRow()->name : 'Unknown';
            // Store the taluk name in submitted data
            $submittedData['taluk_name'] = $talukName;
            $submittedData['blood_name'] = $bloodName;        

            
            return redirect()->to('/success')->with('message', 'Member registered successfully.');
        } else {
            return redirect()->back()->with('error', 'Database insert failed.');
        }
    }
    public function success()
    {
            $submittedData = session()->get('submittedData');
            $talukId = $submittedData['taluk']; // Get the taluk ID from session data
            $bloodId = $submittedData['blood'];
            $id = $submittedData['id'];
            // Load the database
            $db = \Config\Database::connect();
            // Fetch the taluk name from the locations table
            $query = $db->table('locations')
                        ->select('LocationName, RTOCodes') // Assuming column name is 'taluk_name'
                        ->where('ID', $talukId)
                        ->get();
                        $talukName = $query->getRow() ? $query->getRow()->LocationName : 'Unknown';
                        $rtoCode =  $query->getRow() ? $query->getRow()->RTOCodes : 'Unknown';
            
            $rtoCode = str_replace(['-', ' '], '', $rtoCode); // Remove dashes and spaces
            $formattedId = str_pad($id, 4, '0', STR_PAD_LEFT); // Make ID 4 digits (e.g., 1 → 0001)
            $firstThreeLetters = $this->getFilteredTalukCode($talukName);
            $membershipID = $rtoCode.$firstThreeLetters.$formattedId;

            // echo $membershipID;
            // Fetch the taluk name from the locations table
            $query = $db->table('blood_groups')
                        ->select('name') // Assuming column name is 'taluk_name'
                        ->where('id', $bloodId)
                        ->get();
            $bloodName = $query->getRow() ? $query->getRow()->name : 'Unknown';
            // Store the taluk name in submitted data
            $submittedData['taluk_name'] = $talukName;
            $submittedData['blood_name'] = $bloodName;        
            return view('member/success', ['data' => $submittedData]);
    }

    public function getFilteredTalukCode($talukName) {
        // Remove vowels (case insensitive)
        $talukNameWithoutVowels = str_ireplace(['a', 'e', 'i', 'o', 'u'], '', $talukName);
        // Remove consecutive duplicate letters
        $filtered = '';
        $prevChar = '';
        
        for ($i = 0; $i < strlen($talukNameWithoutVowels); $i++) {
            if ($talukNameWithoutVowels[$i] !== $prevChar) {
                $filtered .= $talukNameWithoutVowels[$i];
            }
            $prevChar = $talukNameWithoutVowels[$i];
    
            // Stop when we have 3 characters
            if (strlen($filtered) == 3) {
                break;
            }
        }
    
        return strtoupper($filtered);
    }
}

?>