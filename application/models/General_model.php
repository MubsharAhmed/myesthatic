<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class General_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function getAll()
    {
        $this->db->select('*');
        $this->db->from('general_settings');
        $query = $this->db->get();
        return $query->row_array();
    }


    public function saveContent($data)
    {
        $this->db->where('section_id', $data['section_id']);
        $query = $this->db->get('home_page_sections');

        if ($query->num_rows() > 0) {
            $this->db->where('section_id', $data['section_id']);
            return $this->db->update('home_page_sections', $data);
        } else {
            return $this->db->insert('home_page_sections', $data);
        }
    }

    public function getContentBySectionId($sectionId)
    {
        $this->db->where('section_id', $sectionId);
        $query = $this->db->get('home_page_sections');

        if ($query->num_rows() > 0) {
            return $query->row()->content;
        }
        return '';
    }


    public function updateGeneralSettings($data)
    {

        $this->db->select('id');
        $this->db->from('general_settings');
        $this->db->where('id', 1);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {

            $this->db->where('id', 1);
            return $this->db->update('general_settings', $data);
        } else {
            return $this->db->insert('general_settings', $data);
        }
    }
    public function getAllAboutUs()
    {
        $this->db->select('*');
        $this->db->from('about_us');
        $query = $this->db->get();
        return $query->row_array();
    }
    public function updateAboutUsSettings($data)
    {
        $this->db->select('id');
        $this->db->from('about_us');
        $this->db->where('id', 1);

        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            $this->db->where('id', 1);
            return $this->db->update('about_us', $data);
        } else {
            return $this->db->insert('about_us', $data);
        }
    }
    public function getAllHomeSections()
    {
        $this->db->select('*');
        $this->db->from('home');
        $query = $this->db->get();
        return $query->row_array();
    }
    public function updateHomeSettings($data)
    {
        $this->db->select('id');
        $this->db->from('home');
        $this->db->where('id', 1);

        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            $this->db->where('id', 1);
            return $this->db->update('home', $data);
        } else {
            return $this->db->insert('home', $data);
        }
    }
    // Get all service types
    public function getServiceTypes()
    {
        return $this->db->get('service_types')->result_array();
    }

    // Get all services
    public function getAllServices()
    {
        return $this->db->get('services')->result_array();
    }

    // Get service by ID
    public function getServiceById($id)
    {
        return $this->db->get_where('services', ['id' => $id])->row();
    }

    // Update service by ID
    public function updateService($service_id, $data)
    {
        $this->db->where('id', $service_id);
        $this->db->update('services', $data);
    }


    // Add new service
    public function addService($data)
    {
        $this->db->insert('services', $data);
    }
    public function addServiceType($name) {
        $this->db->insert('service_types', ['name' => $name]);
    }
    


    // Delete service by ID
    public function deleteService($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('services');
    }

    // Update service type by ID
    public function updateServiceType($service_type_id, $new_name) {
        $this->db->where('id', $service_type_id);
        $this->db->update('service_types', ['name' => $new_name]);
    }

    public function checkServiceTypeUsage($service_type_id) {
        $this->db->where('service_type_id', $service_type_id);
        $this->db->from('services');
        return $this->db->count_all_results();
    }
    

    public function deleteServiceType($service_type_id) {
        $this->db->where('id', $service_type_id);
        $this->db->delete('service_types');
    }
    
    
    
    // Update static services section
    // public function updatestaticServices($data) {
    //     return $this->db->update('static_services', $data);
    // }

    // // Get static service section
    // public function getStaticServiceSection() {
    //     return $this->db->get('static_services')->row();
    // }
    public function getStaticServiceSection()
    {
        return $this->db->get_where('services_static_section', ['id' => 1])->row();
    }
    public function updatestaticServices($data)
    {
        $this->db->select('id');
        $this->db->from('services_static_section');
        $this->db->where('id', 1);

        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            $this->db->where('id', 1);
            return $this->db->update('services_static_section', $data);
        } else {
            return $this->db->insert('services_static_section', $data);
        }
    }
    public function updateCaseStudiesData($data)
    {

        $this->db->select('id');
        $this->db->from('case_studies');
        $this->db->where('id', 1);

        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            $this->db->where('id', 1);
            return $this->db->update('case_studies', $data);
        } else {
            return $this->db->insert('case_studies', $data);
        }
    }
    public function getAllCaseStudiesData()
    {
        $this->db->select('*');
        $this->db->from('case_studies');
        $query = $this->db->get();
        return $query->row_array();
    }
    public function getAllPricePackageData()
    {
        $this->db->select('*');
        $this->db->from('price_package');
        $query = $this->db->get();
        return $query->row_array();
    }

    public function updatePricePackage($data)
    {
        foreach ($data as $id => $packageData) {
            $this->db->select('id');
            $this->db->from('price_package');
            $this->db->where('id', $id);

            $query = $this->db->get();

            if ($query->num_rows() > 0) {
                $this->db->where('id', $id);
                $this->db->update('price_package', $packageData);
            } else {
                $this->db->insert('price_package', $packageData);
            }
        }

        return true;
    }

    public function updateOrInsertIndividualSection($data)
    {
        $id = 1;

        // Check if the record exists
        $this->db->select('id');
        $this->db->from('individual_section');
        $this->db->where('id', $id);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            // Record exists, update it
            $this->db->where('id', $id);
            return $this->db->update('individual_section', $data);
        } else {
            // Record does not exist, insert it
            $data['id'] = $id;
            return $this->db->insert('individual_section', $data);
        }
    }
    public function getAllIndividualData()
    {
        $this->db->select('*');
        $this->db->from('individual_section');
        $query = $this->db->get();
        return $query->row_array();
    }



    public function updatePopup($data)
    {
        $this->db->select('id');
        $this->db->from('pop_up');
        $this->db->where('id', 1);

        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            $this->db->where('id', 1);
            return $this->db->update('pop_up', $data);
        } else {
            return $this->db->insert('pop_up', $data);
        }
    }

    public function getAllPopup()
    {
        return $this->db->get_where('pop_up', ['id' => 1])->row();
    }

    // for seeding data into admin table 
    public function seedAdminTable()
    {
        $data = [
            'name'     => 'Admin User',
            'email'    => 'admin2@gmail.com',
            'password' => password_hash('password', PASSWORD_DEFAULT),
        ];

        $existingAdmin = $this->db->get_where('admin', ['email' => $data['email']])->row();

        if (!$existingAdmin) {
            $this->db->insert('admin', $data);
            return "Admin data seeded successfully!";
        } else {
            return "Admin already exists!";
        }
    }
        public function insert_plan($data) {
            return $this->db->insert('plans', $data);
        }
    

        public function update_plan($id, $data) {
            $this->db->where('id', $id);
            return $this->db->update('plans', $data);
        }
    
        public function get_all_plans() {
            $query = $this->db->get('plans');
            return $query->result_array();
        }
        public function get_plan_by_id($id) {
            $this->db->where('id', $id);
            $query = $this->db->get('plans');
            return $query->row_array(); 
        }
        
}



