<?php
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\MemberModel;
class MemberController extends Controller
{
    public function listMembers()
    {
        $memberModel = new MemberModel();
        $members = $memberModel->findAll();

        return view('member/list_members', ['members' => $members]);
    }

    public function viewMember($id)
    {
        $memberModel = new MemberModel();
        $member = $memberModel->find($id);

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
            'district' => 'required',
            'pin' => 'required|exact_length[6]|numeric',
            'taluk' => 'required',
            'panchayath' => 'required',
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
            'panchayath' => $this->request->getPost('panchayath'),
            'photo' => $newFileName,
            'aadhar' => $this->request->getPost('aadhar'),
        ];

        $builder = $db->table('members');
        if ($builder->insert($data)) {
            // Store submitted data in session and redirect to success page
            session()->set('submittedData', $data);
            return redirect()->to('/success')->with('message', 'Member registered successfully.');
        } else {
            return redirect()->back()->with('error', 'Database insert failed.');
        }
    }
    public function success()
    {
        $submittedData = session()->get('submittedData');
        return view('member/success', ['data' => $submittedData]);
    }
}

?>