<?php namespace App\Controllers\Admin;

    use \App\Controllers\BaseController;
    use \App\Models\AdminModel;
    
    class Profile extends BaseController{
        public function index(){
            $session= $this->session;
            $adminModel = new AdminModel();
            if(!isset($session->admin_id)){
                redirect()->to(site_url("admin/login"));
            }
            if($this->request->getPost("last_name") && $this->request->getPost("first_name") ){
                $validation = \Config\Services::validation();
                $validation->setRule("first_name","Prénom","required|min_length[3]");
                $validation->setRule("last_name","Nom","required|min_length[3]");
                if($validation->withRequest($this->request)->run()!==FALSE){
                    $first_name=$this->request->getPost("first_name");
                    $last_name=$this->request->getPost("last_name");
                    $adminModel->updateProfileData($first_name,$last_name,$session->admin_id);
                    $session->set([
                        "admin_first_name"=>$first_name,
                        "admin_last_name"=>$last_name    
                    ]);
                    $session->setFlashdata("success_message","Profile modifié avec succès");
                }else{
                    if($validation->hasError("first_name")){
                        $session->setFlashdata("first_name",$validation->getError("first_name"));
                    }
                    if($validation->hasError("last_name")){
                        $session->setFlashdata("last_name",$validation->getError("last_name"));
                    }
                }
            }
            if($this->request->getPost("password") && $this->request->getPost("new_password") ){
                $validation = \Config\Services::validation();
                $validation->setRule("password","Mot de passe actuel","required|min_length[8]");
                $validation->setRule("new_password","Nouveau mot de passe","required|min_length[8]");
                if($validation->withRequest($this->request)->run()!==FALSE){
                    $first_name=$this->request->getPost("password");
                    $last_name=$this->request->getPost("new_password");
                    if($adminModel->isValidPassword($password,$session->admin_id)){

                    }
                    $adminModel->updateProfileData($first_name,$last_name,$session->admin_id);
                    $session->set([
                        "admin_first_name"=>$first_name,
                        "admin_last_name"=>$last_name    
                    ]);
                    $session->setFlashdata("success_message","Profile modifié avec succès");
                }else{
                    if($validation->hasError("first_name")){
                        $session->setFlashdata("first_name",$validation->getError("first_name"));
                    }
                    if($validation->hasError("last_name")){
                        $session->setFlashdata("last_name",$validation->getError("last_name"));
                    }
                }
            }


            // START HEAD TEMPLATE
            $myConfig =$this->myConfig;
            $data_head=[];
            $data_head['myConfig']=$myConfig;
            $data_head['title']="Mon profile";
            $data_head['principal_title']="Paramètres du compte";
            $data_head['breadcrumb']=[
                [
                    "title"=>"Dashboard",
                    "link"=>site_url("admin/dashboard")
                ],
                [
                    "title"=>"Profile",
                    "link"=>false
                ]
            ];
            $data_head['css_files']=[
                site_url('assets/css/cropper.min.css')
            ];
            echo view("admin//layout/template_head.php",$data_head);
            // END HEAD TEMPLATE

            // START BODY
            

            $data['adminData'] = $adminModel->getAdminDataById($session->admin_id);
            echo view("admin/profile",$data);
            // END BODY

            // START FOOTER TEMPLATE
            $data_footer['js_files']=[
                site_url("assets/js/cropper.min.js"),
                site_url("assets/js/jquery-cropper.min.js")
                
            ];
            $data_footer['scripts_footer']=[
                view("admin/script_profile",['sessview'=>$session])
            ];
            $data_footer['myConfig']=$myConfig;
            echo view("admin//layout/template_footer.php",$data_footer);
            // END FOOTER TEMPLATE
        }
    }
?>