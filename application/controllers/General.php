<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

class General extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('general_model');
    }

    public function saveSectionContent()
    {
        $sectionId = $this->input->post('section_id');
        $content = $this->input->post('content');

        if (!empty($sectionId) && !empty($content)) {
            $pattern = '/data:image\/(png|jpg|jpeg|gif);base64,([^\"]*)/';
            preg_match_all($pattern, $content, $matches);

            foreach ($matches[0] as $index => $base64Image) {
                $imageType = $matches[1][$index];
                $imageData = base64_decode($matches[2][$index]);

                if ($imageData === false) {
                    continue;
                }

                $fileName = uniqid() . '.' . $imageType;
                $uploadPath = FCPATH . 'uploads/summernote/';
                $filePath = $uploadPath . $fileName;

                if (!is_dir($uploadPath)) {
                    mkdir($uploadPath, 0755, true);
                }

                if (file_put_contents($filePath, $imageData) === false) {
                    continue;
                }
                $content = str_replace($base64Image, base_url('uploads/summernote/' . $fileName), $content);
            }

            $data = array(
                'section_id' => $sectionId,
                'content' => $content
            );

            $result = $this->general_model->saveContent($data);

            if ($result) {
                echo json_encode(['status' => 'success', 'message' => 'Content saved successfully!']);
            } else {
                echo json_encode(['status' => 'error', 'message' => 'Failed to save content.']);
            }
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Invalid data provided.']);
        }
    }




    // this is seeder for seeding data into admin table 
    public function seedAdmin()
    {
        $this->load->model('general_model');
        $message = $this->general_model->seedAdminTable();
        echo $message;
    }

    // these 2 are function render the data and update the general setting 
    public function generalSetting()
    {
        if (!$this->isAdmin()) {
            redirect('login');
        }
        $this->global['pageTitle'] = 'VearaLink : General Setting';
        $data['settings'] = $this->general_model->getAll();
        $this->loadViews("general_setting/general", $this->global, $data, NULL);
    }
    public function update()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('address', 'Address', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('phone', 'Phone', 'required');
        $this->form_validation->set_rules('about_company', 'About Company', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->index();
        } else {
            $data = array(
                'address' => $this->input->post('address'),
                'email' => $this->input->post('email'),
                'phone' => $this->input->post('phone'),
                'about_company' => $this->input->post('about_company')
            );
            if (!empty($_FILES['logo_image']['name'])) {
                $config['upload_path']   = './uploads/logo/';
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                $config['file_name']     = time() . '_' . $_FILES['logo_image']['name'];

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('logo_image')) {
                    $uploadData = $this->upload->data();
                    $data['logo_image'] = $uploadData['file_name'];
                }
            }
            for ($i = 1; $i <= 3; $i++) {
                if (!empty($_FILES["s_image_$i"]['name'])) {
                    $config['upload_path']   = './uploads/slider_images/';
                    $config['allowed_types'] = 'jpg|jpeg|png|gif';
                    $config['file_name']     = time() . '_' . $_FILES["s_image_$i"]['name'];
                    // $config['max_size'] = 0; 


                    $this->load->library('upload', $config);

                    if ($this->upload->do_upload("s_image_$i")) {
                        $uploadData = $this->upload->data();
                        $data["s_image_$i"] = $uploadData['file_name'];
                    }
                }
            }
            $this->general_model->updateGeneralSettings($data);
            $this->session->set_flashdata('success', 'Settings updated successfully');
            redirect('general/generalSetting');
        }
    }
    // general setting end

    //  popup setting
    public function popup()
    {
        if (!$this->isAdmin()) {
            redirect('login');
        }
        $this->global['pageTitle'] = 'VearaLink : Popup Setting';
        $data['popUp'] = $this->general_model->getAllPopup();
        $this->loadViews("general_setting/popup", $this->global, $data,  NULL);
    }

    public function updatePopup()
    {

        $data = array(
            'heading_1_line' => $this->input->post('heading_1_line'),
            'heading_2_line' => $this->input->post('heading_2_line'),
            'text_1_line' => $this->input->post('text_1_line'),
            'text_2_line' => $this->input->post('text_2_line'),
            'text_3_line' => $this->input->post('text_3_line'),

        );
        if (!empty($_FILES['popup_image']['name'])) {
            $config['upload_path']   = './uploads/popup/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif|webp';
            $config['file_name']     = time() . '_' . $_FILES['popup_image']['name'];

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('popup_image')) {
                $uploadData = $this->upload->data();
                $data['popup_image'] = $uploadData['file_name'];
            }
        }


        $this->general_model->updatePopup($data);
        $this->session->set_flashdata('success', 'Settings updated successfully');
        redirect('general/popup');
    }

    // below is about us page setting fucntion 
    public function aboutUs()
    {
        if (!$this->isAdmin()) {
            redirect('login');
        }
        $this->global['pageTitle'] = 'VearaLink : About Us';

        $data['about'] = $this->general_model->getAllAboutUs();

        $this->loadViews("general_setting/aboutus", $this->global, $data,   NULL);
    }
    public function updateAboutUs()
    {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('section_5_text', 'Section 5 Text', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->aboutUs();
        } else {
            $data = array(
                'section_1_text'     => $this->input->post('section_1_text'),
                'section_2_h1'       => $this->input->post('section_2_h1'),
                'section_2_h2'       => $this->input->post('section_2_h2'),
                'section_2_text'     => $this->input->post('section_2_text'),
                'section_3_heading'  => $this->input->post('section_3_heading'),
                'section_3_text'     => $this->input->post('section_3_text'),
                'section_4_heading'  => $this->input->post('section_4_heading'),
                'section_4_text'     => $this->input->post('section_4_text'),
                'section_5_heading'  => $this->input->post('section_5_heading'),
                'section_5_text'     => $this->input->post('section_5_text')
            );

            if (!empty($_FILES['section_2_image']['name'])) {
                $config['upload_path']   = './uploads/about_us/';
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                $config['file_name']     = time() . '_' . $_FILES['section_2_image']['name'];

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('section_2_image')) {
                    $uploadData = $this->upload->data();
                    $data['section_2_image'] = $uploadData['file_name'];
                }
            }
            // Section 3 Image Upload
            if (!empty($_FILES['section_3_image']['name'])) {
                $config['upload_path']   = './uploads/about_us/';
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                $config['file_name']     = time() . '_' . $_FILES['section_3_image']['name'];

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('section_3_image')) {
                    $uploadData = $this->upload->data();
                    $data['section_3_image'] = $uploadData['file_name'];
                }
            }
            // Section 4 Image Upload
            if (!empty($_FILES['section_4_image']['name'])) {
                $config['upload_path']   = './uploads/about_us/';
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                $config['file_name']     = time() . '_' . $_FILES['section_4_image']['name'];

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('section_4_image')) {
                    $uploadData = $this->upload->data();
                    $data['section_4_image'] = $uploadData['file_name'];
                }
            }
            // Section 5 Image Upload
            if (!empty($_FILES['section_5_image']['name'])) {
                $config['upload_path']   = './uploads/about_us/';
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                $config['file_name']     = time() . '_' . $_FILES['section_5_image']['name'];
                $config['max_size'] = 0;

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('section_5_image')) {
                    $uploadData = $this->upload->data();
                    $data['section_5_image'] = $uploadData['file_name'];
                }
            }
            $this->general_model->updateAboutUsSettings($data);
            $this->session->set_flashdata('success', 'About Us settings updated successfully');
            redirect('general/aboutUs');
        }
    }
    // about us page setting fucntion end 

    // home function started
    // This is the home page view function 
    public function home()
    {

        if (!$this->isAdmin()) {
            redirect('login');
        }
        $this->global['pageTitle'] = 'VearaLink : Home Update';

        $data['home'] = $this->general_model->getAllHomeSections();

        // print_r($data['home']);
        // die;

        $this->loadViews("general_setting/home", $this->global, $data,   NULL);
    }
    // this is the home page update page section update 
    public function homeUpdate()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('section_1_small_h', 'Section 1 Small Heading', 'required');
        $this->form_validation->set_rules('section_1_heading', 'Section 1 Heading', 'required');
        $this->form_validation->set_rules('section_1_short_desc', 'Section 1 Short Description', 'required');
        $this->form_validation->set_rules('section_1_long_desc', 'Section 1 Long Description', 'required');
        $this->form_validation->set_rules('section_2_heading', 'Section 2 Heading', 'required');
        $this->form_validation->set_rules('section_2_text', 'Section 2 Text', 'required');
        $this->form_validation->set_rules('section_3_small_h', 'Section 3 Small Heading', 'required');
        $this->form_validation->set_rules('section_3_heading', 'Section 3 Heading', 'required');
        $this->form_validation->set_rules('section_4_small_h', 'Section 4 Small Heading', 'required');
        $this->form_validation->set_rules('section_4_heading', 'Section 4 Heading', 'required');
        $this->form_validation->set_rules('section_5_heading', 'Section 5 Heading', 'required');
        $this->form_validation->set_rules('section_5_video_url', 'Section 5 Video URL', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->aboutUs();
        } else {
            $data = array(
                'section_1_small_h'     => $this->input->post('section_1_small_h'),
                'section_1_heading'     => $this->input->post('section_1_heading'),
                'section_1_short_desc'  => $this->input->post('section_1_short_desc'),
                'section_1_long_desc'   => $this->input->post('section_1_long_desc'),
                'section_2_heading'     => $this->input->post('section_2_heading'),
                'section_2_text'        => $this->input->post('section_2_text'),
                'section_3_small_h'     => $this->input->post('section_3_small_h'),
                'section_3_heading'     => $this->input->post('section_3_heading'),
                'section_3_c1_text'   => $this->input->post('section_3_c1_text'),
                'section_3_c2_text'   => $this->input->post('section_3_c2_text'),
                'section_3_c3_text'   => $this->input->post('section_3_c3_text'),
                'section_3_c1_h'   => $this->input->post('section_3_c1_h'),
                'section_3_c2_h'   => $this->input->post('section_3_c2_h'),
                'section_3_c3_h'   => $this->input->post('section_3_c3_h'),
                'section_4_small_h'     => $this->input->post('section_4_small_h'),
                'section_4_heading'     => $this->input->post('section_4_heading'),
                'icon_1_text' => $this->input->post('icon_1_text'),
                'icon_2_text' => $this->input->post('icon_2_text'),
                'icon_3_text' => $this->input->post('icon_3_text'),
                'icon_4_text' => $this->input->post('icon_4_text'),
                'section_4_desc' => $this->input->post('section_4_desc'),
                'icon_5_text' => $this->input->post('icon_5_text'),
                'section_5_heading'     => $this->input->post('section_5_heading'),
                'section_5_video_url'   => $this->input->post('section_5_video_url'),
            );
            $uploads = [
                'section_1_image_1',
                'section_1_image_2',
                'section_2_imagee',
                'section_3_c1_image',
                'section_3_c2_image',
                'section_3_c3_image',
                'section_3_c1_icon',
                'section_3_c2_icon',
                'section_3_c3_icon',
                'section_4_image',
                'section_4_icon_1',
                'section_4_icon_2',
                'section_4_icon_3',
                'section_4_icon_4',
                'section_4_icon_5',
            ];
            // print_r($data);
            // die;
            foreach ($uploads as $uploadField) {
                if (!empty($_FILES[$uploadField]['name'])) {
                    $config['upload_path']   = './uploads/home/';
                    $config['allowed_types'] = 'jpg|jpeg|png|gif|svg|webp|bmp|tiff';
                    $config['file_name']     = time() . '_' . $_FILES[$uploadField]['name'];
                    $config['max_size'] = 10000;
                    $config['max_width'] = 10000;
                    $config['max_height'] = 10000;

                    $this->load->library('upload', $config);

                    if ($this->upload->do_upload($uploadField)) {
                        $uploadData = $this->upload->data();
                        $data[$uploadField] = $uploadData['file_name'];
                    }
                }
            }


            $this->general_model->updateHomeSettings($data);

            $this->session->set_flashdata('success', 'Home settings updated successfully');
            redirect('general/home');
        }
    }
    // home page end

    // services function started
    // services view page 
    public function services()
    {
        if (!$this->isAdmin()) {
            redirect('login');
        }
        $this->global['pageTitle'] = 'VearaLink : Services';

        // Fetch service types and all services
        $data['service_types'] = $this->general_model->getServiceTypes();
        $data['services'] = $this->general_model->getAllServices();
        $data['staticSection'] = $this->general_model->getStaticServiceSection();

        $this->loadViews("general_setting/services", $this->global, $data,  NULL);
    }

    // Update service type name by ID
    public function updateServiceType()
    {
        $service_type_id = $this->input->post('service_type_id');
        $new_name = $this->input->post('new_name');

        if ($service_type_id && $new_name) {
            $this->general_model->updateServiceType($service_type_id, $new_name);
            redirect('general/services');
        } else {
            $this->session->set_flashdata('error', 'Please select a service type and enter a new name.');
            redirect('general/services');
        }
    }

    public function checkServiceTypeUsage($service_type_id)
    {
        $usage_count = $this->general_model->checkServiceTypeUsage($service_type_id);
        echo json_encode(['usage_count' => $usage_count]);
    }

    public function deleteServiceType()
    {
        $service_type_id = $this->input->post('service_type_id');

        if ($service_type_id) {
            // Check if the service type has associated services
            $usage_count = $this->general_model->checkServiceTypeUsage($service_type_id);
            if ($usage_count > 0) {
                $this->session->set_flashdata('error', 'Please delete associated services before deleting this service type.');
            } else {
                $this->general_model->deleteServiceType($service_type_id);
                $this->session->set_flashdata('success', 'Service type deleted successfully.');
            }
        } else {
            $this->session->set_flashdata('error', 'Please select a service type to delete.');
        }

        redirect('general/services');
    }




    // Update static service section
    public function updateStaticSection()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('static_title', 'Title', 'required');
        $this->form_validation->set_rules('static_description', 'Description', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->services();
        } else {
            $data = array(
                'title' => $this->input->post('static_title'),
                'description' => $this->input->post('static_description'),
            );

            if (!empty($_FILES['image']['name'])) {
                $uploadPath = './uploads/services/';
                $data['image'] = $this->_uploadImage('image', $uploadPath);
            }

            $this->general_model->updatestaticServices($data);
            $this->session->set_flashdata('success', 'Settings updated successfully');
            redirect('general/services');
        }
    }

    // Add or update service
    public function updateService()
    {
        $service_id = $this->input->post('id');
        $data = [
            'title' => $this->input->post('title'),
            'description' => $this->input->post('description'),
            'service_type_id' => $this->input->post('service_type_id'),
        ];

        $uploadPath = './uploads/services/';

        if (!empty($_FILES['icon_img1']['name'])) {
            $data['icon_img1'] = $this->_uploadImage('icon_img1', $uploadPath);
        }

        if (!empty($_FILES['icon_img2']['name'])) {
            $data['icon_img2'] = $this->_uploadImage('icon_img2', $uploadPath);
        }

        if ($service_id) {

            $this->general_model->updateService($service_id, $data);
        } else {
            // Add new service
            $this->general_model->addService($data);
        }

        redirect('general/services');
    }


    // Fetch single service for editing
    public function getService($id)
    {
        $service = $this->general_model->getServiceById($id);
        echo json_encode($service);
    }

    // Delete service by ID
    public function deleteService($id)
    {
        $service = $this->general_model->getServiceById($id);

        if ($service) {
            $this->general_model->deleteService($id);

            if ($this->db->affected_rows() > 0) {
                $this->_deleteServiceImages($service);
                echo json_encode(['success' => true, 'message' => 'Service deleted successfully.']);
            } else {
                echo json_encode(['success' => false, 'message' => 'Failed to delete the service.']);
            }
        } else {
            echo json_encode(['success' => false, 'message' => 'Service not found.']);
        }
    }
    public function addServiceType()
    {
        $name = $this->input->post('name');

        if ($name) {
            $this->general_model->addServiceType($name);
            redirect('general/services');
        } else {
            $this->session->set_flashdata('error', 'Service type name cannot be empty.');
            redirect('general/services');
        }
    }


    // Helper function to upload images
    private function _uploadImage($fieldName, $uploadPath)
    {
        $config['upload_path']   = $uploadPath;
        $config['allowed_types'] = 'jpg|jpeg|png|gif|svg|webp|bmp|tiff';
        $config['max_size']      = 2048; // Max size in KB
        $config['encrypt_name']  = TRUE; // Encrypt file name to prevent duplication

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload($fieldName)) {
            // Handle error
            $error = $this->upload->display_errors();
            $this->session->set_flashdata('error', $error);
            redirect('general/services');
        } else {
            $uploadData = $this->upload->data();
            return $uploadData['file_name']; // Return the name of the uploaded file
        }
    }


    // Helper function to delete images
    private function _deleteServiceImages($service)
    {
        if (file_exists('./uploads/services/' . $service->icon_img1)) {
            unlink('./uploads/services/' . $service->icon_img1);
        }
        if (file_exists('./uploads/services/' . $service->icon_img2)) {
            unlink('./uploads/services/' . $service->icon_img2);
        }
    }
    // services function end 

    // case studies started 
    public function caseStudies()
    {
        if (!$this->isAdmin()) {
            redirect('login');
        }
        $this->global['pageTitle'] = 'VearaLink : caseStudies';
        $data['case'] = $this->general_model->getAllCaseStudiesData();
        $this->loadViews("general_setting/casestudies", $this->global, $data,  NULL);
    }
    public function updateCaseStudies()
    {
        $this->load->library('form_validation');

        // Form validation rules for section 1
        $this->form_validation->set_rules('section1_main_content', 'Section 1 Main Content', 'required');



        // Add validation for other sections similarly...

        if ($this->form_validation->run() == FALSE) {
            $this->services();
        } else {
            $data = array(
                // Section 1
                'section1_main_content' => $this->input->post('section1_main_content'),
                'section1_card1_heading' => $this->input->post('section1_card1_heading'),
                'section1_card1_description' => $this->input->post('section1_card1_description'),
                'section1_card2_heading' => $this->input->post('section1_card2_heading'),
                'section1_card2_description' => $this->input->post('section1_card2_description'),
                'section1_card3_heading' => $this->input->post('section1_card3_heading'),
                'section1_card3_description' => $this->input->post('section1_card3_description'),
                'section1_card4_heading' => $this->input->post('section1_card4_heading'),
                'section1_card4_description' => $this->input->post('section1_card4_description'),

                // Section 2
                'section2_main_content' => $this->input->post('section2_main_content'),
                'section2_card1_heading' => $this->input->post('section2_card1_heading'),
                'section2_card1_description' => $this->input->post('section2_card1_description'),
                'section2_card2_heading' => $this->input->post('section2_card2_heading'),
                'section2_card2_description' => $this->input->post('section2_card2_description'),
                'section2_card3_heading' => $this->input->post('section2_card3_heading'),
                'section2_card3_description' => $this->input->post('section2_card3_description'),
                'section2_card4_heading' => $this->input->post('section2_card4_heading'),
                'section2_card4_description' => $this->input->post('section2_card4_description'),

                // Section 3
                'section3_main_content' => $this->input->post('section3_main_content'),
                'section3_card1_heading' => $this->input->post('section3_card1_heading'),
                'section3_card1_description' => $this->input->post('section3_card1_description'),
                'section3_card2_heading' => $this->input->post('section3_card2_heading'),
                'section3_card2_description' => $this->input->post('section3_card2_description'),
                'section3_card3_heading' => $this->input->post('section3_card3_heading'),
                'section3_card3_description' => $this->input->post('section3_card3_description'),
                'section3_card4_heading' => $this->input->post('section3_card4_heading'),
                'section3_card4_description' => $this->input->post('section3_card4_description'),

                // Section 4
                'section4_main_content' => $this->input->post('section4_main_content'),
                'section4_card1_heading' => $this->input->post('section4_card1_heading'),
                'section4_card1_description' => $this->input->post('section4_card1_description'),
                'section4_card2_heading' => $this->input->post('section4_card2_heading'),
                'section4_card2_description' => $this->input->post('section4_card2_description'),
                'section4_card3_heading' => $this->input->post('section4_card3_heading'),
                'section4_card3_description' => $this->input->post('section4_card3_description'),
                'section4_card4_heading' => $this->input->post('section4_card4_heading'),
                'section4_card4_description' => $this->input->post('section4_card4_description')
            );

            // Handle image uploads for section 1
            for ($i = 1; $i <= 4; $i++) {
                if (!empty($_FILES['section1_card' . $i . '_image']['name'])) {
                    $config['upload_path']   = './uploads/casestudies/';
                    $config['allowed_types'] = 'jpg|jpeg|png|gif';
                    $config['file_name']     = time() . '_' . $_FILES['section1_card' . $i . '_image']['name'];

                    $this->load->library('upload', $config);

                    if ($this->upload->do_upload('section1_card' . $i . '_image')) {
                        $uploadData = $this->upload->data();
                        $data['section1_card' . $i . '_image'] = $uploadData['file_name'];
                    }
                }
            }

            // Handle image uploads for section 2
            for ($i = 1; $i <= 4; $i++) {
                if (!empty($_FILES['section2_card' . $i . '_image']['name'])) {
                    $config['upload_path']   = './uploads/casestudies/';
                    $config['allowed_types'] = 'jpg|jpeg|png|gif';
                    $config['file_name']     = time() . '_' . $_FILES['section2_card' . $i . '_image']['name'];

                    $this->load->library('upload', $config);

                    if ($this->upload->do_upload('section2_card' . $i . '_image')) {
                        $uploadData = $this->upload->data();
                        $data['section2_card' . $i . '_image'] = $uploadData['file_name'];
                    }
                }
            }

            // Handle image uploads for section 3
            for ($i = 1; $i <= 4; $i++) {
                if (!empty($_FILES['section3_card' . $i . '_image']['name'])) {
                    $config['upload_path']   = './uploads/casestudies/';
                    $config['allowed_types'] = 'jpg|jpeg|png|gif';
                    $config['file_name']     = time() . '_' . $_FILES['section3_card' . $i . '_image']['name'];

                    $this->load->library('upload', $config);

                    if ($this->upload->do_upload('section3_card' . $i . '_image')) {
                        $uploadData = $this->upload->data();
                        $data['section3_card' . $i . '_image'] = $uploadData['file_name'];
                    }
                }
            }

            // Handle image uploads for section 4
            for ($i = 1; $i <= 4; $i++) {
                if (!empty($_FILES['section4_card' . $i . '_image']['name'])) {
                    $config['upload_path']   = './uploads/casestudies/';
                    $config['allowed_types'] = 'jpg|jpeg|png|gif';
                    $config['file_name']     = time() . '_' . $_FILES['section4_card' . $i . '_image']['name'];

                    $this->load->library('upload', $config);

                    if ($this->upload->do_upload('section4_card' . $i . '_image')) {
                        $uploadData = $this->upload->data();
                        $data['section4_card' . $i . '_image'] = $uploadData['file_name'];
                    }
                }
            }


            // Repeat the same for section 2, 3, and 4...

            // Update the data in the database
            $this->general_model->updateCaseStudiesData($data);

            $this->session->set_flashdata('success', 'Section updated successfully');
            redirect('general/caseStudies');
        }
    }
    // case studies end 

    // price packages started 
    public function pricePackage($id = null)
    {
        if (!$this->isAdmin()) {
            redirect('login');
        }
        $this->global['pageTitle'] = 'VearaLink : Price Packages';

        // Fetch all packages
        $data['packages'] = $this->db->get('price_package')->result_array();

        // Fetch all packages (this example fetches specific plans by ID 1, 2, and 3)
        $data['plan1'] = $this->general_model->get_plan_by_id(1);
        $data['plan2'] = $this->general_model->get_plan_by_id(2);
        $data['plan3'] = $this->general_model->get_plan_by_id(3);

        $data['section'] = $this->general_model->getAllIndividualData();
        $this->loadViews("general_setting/pricepackage", $this->global, $data, NULL);
    }

    public function updatePricePackage()
    {
        $postData = $this->input->post();
        $data = [];
        for ($id = 1; $id <= 3; $id++) {
            $data[$id] = [
                'pricing' => isset($postData["pricing_{$id}"]) ? $postData["pricing_{$id}"] : 0,
                'telephone_number' => isset($postData["telephone_number_{$id}"]) ? $postData["telephone_number_{$id}"] : 0,
                'unlimited_calls_us' => isset($postData["unlimited_calls_us_{$id}"]) ? $postData["unlimited_calls_us_{$id}"] : 0,
                'voicemail_to_email' => isset($postData["voicemail_to_email_{$id}"]) ? $postData["voicemail_to_email_{$id}"] : 0,
                'support_24_7' => isset($postData["support_24_7_{$id}"]) ? $postData["support_24_7_{$id}"] : 0,
                'up_to_25_users' => isset($postData["up_to_25_users_{$id}"]) ? $postData["up_to_25_users_{$id}"] : 0,
                'internet_fax' => isset($postData["internet_fax_{$id}"]) ? $postData["internet_fax_{$id}"] : 0,
                'audio_conferencing' => isset($postData["audio_conferencing_{$id}"]) ? $postData["audio_conferencing_{$id}"] : 0,
                'softphone' => isset($postData["softphone_{$id}"]) ? $postData["softphone_{$id}"] : 0,
                'third_party_integration' => isset($postData["third_party_integration_{$id}"]) ? $postData["third_party_integration_{$id}"] : 0,
                'self_care_portal' => isset($postData["self_care_portal_{$id}"]) ? $postData["self_care_portal_{$id}"] : 0,
                'auto_attendant' => isset($postData["auto_attendant_{$id}"]) ? $postData["auto_attendant_{$id}"] : 0,
                'call_detailed_record' => isset($postData["call_detailed_record_{$id}"]) ? $postData["call_detailed_record_{$id}"] : 0,
            ];
        }
        $this->general_model->updatePricePackage($data);
        redirect('general/pricepackage');
    }
    public function UpdateIndividualSection()
    {
        $title = $this->input->post('title');
        $phone_price = $this->input->post('phone_price');
        $toll_free_price = $this->input->post('toll_free_price');
        $recording_price = $this->input->post('recording_price');
        $hold_music_price = $this->input->post('hold_music_price');

        $data = array(
            'title' => $title,
            'phone_price' => floatval($phone_price),
            'toll_free_price' => floatval($toll_free_price),
            'recording_price' => floatval($recording_price),
            'hold_music_price' => floatval($hold_music_price)
        );
        $this->general_model->updateOrInsertIndividualSection($data);

        $this->session->set_flashdata('success', 'Settings updated successfully');
        redirect('general/pricepackage');
    }

    public function update_plan()
    {
        $plan_data = [
            'plan_title' => $this->input->post('plan_title'),
            'monthly_price' => $this->input->post('monthly_price'),
            'yearly_price' => $this->input->post('yearly_price'),
            'small_content' => $this->input->post('small_content'),
            'additional_info' => $this->input->post('additional_info'),
            'points' => json_encode(explode(',', $this->input->post('points')))
        ];


        $plan_id = $this->input->post('plan_id');  // Hidden input in case of update
        if ($plan_id) {
            $this->general_model->update_plan($plan_id, $plan_data);
        } else {
            $this->general_model->insert_plan($plan_data);
        }

        // Redirect to some page (maybe the plans listing page)
        redirect('general/pricepackage');
    }

    public function homeEditor()
    {
        if (!$this->isAdmin()) {
            redirect('login');
        }

        $sectionId = 'section-5';

        // Fetch existing content
        $data['content'] = $this->general_model->getContentBySectionId($sectionId);

        $this->global['pageTitle'] = 'VearaLink : Editor Setting';
        $this->loadViews("general_setting/homeeditor", $this->global, $data);
    }

}
