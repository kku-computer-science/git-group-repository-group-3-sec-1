<?php
return [
'Home' => 'Home',
'Researchers' => 'Researchers',
'ResearchProj' => 'Research Project',
'ResearchGroup' => 'Research Group',
'Report' => 'Reports',
'details' =>'More details',
'expertise' => 'Research interests',
'publications' => 'Publications (In the Last 5 Years)',
'education'=>'Education',
'publications2' => 'Publications',

// ส่วนของ Login
'Account_Login' => 'Account Login',
'Username' => 'Username',
'Password' => 'Password',
'Remember_me' => 'Remember me',
'Login_button' => 'Login',
'Forgot_password' => '*** If you forget your password, please contact the administrator',
'Username_kkumail' => 'For Username, use KKU-Mail to log in',
'Student_first_time_login' => 'For students who log in for the first time, log in with your student ID',
'Login_failed' => ' Login Failed: Your username or password is incorrect',
'required' => [
        'username' => 'Username is required',
        'password' => 'Password is required'
],

// ส่วนของ Pagination
'Previous' => 'Previous',
'Next' => 'Next',

// ========================================== ส่วนของ Admin (ผู้วิจัย) ==========================================

// ส่วน Navbar
'Project_title' => 'Research Information Management System',
'Search_here' => 'Search Here',
'Logout' => 'Logout',

// ส่วนของหน้า Dashboard
'Welcome' => 'Welcome to the Research Information Management System',
'Welcome_hello' => 'Hello',
'Dashboard_navbar_title' => 'Dashboard',

// ส่วนของ Profile
'Profile_navbar_title' => 'Profile',

// ส่วนของ User Profile
'User_Profile_navbar_title' => 'User Profile',
'Change_picture' => 'Change Picture',
'User_profile_picture' => 'User Profile Picture',
'Account_tab' => 'Account',
'Password_tab' => 'Password',
'Expertise_tab' => 'Expertise',
'Education_tab' => 'Education',
'Profile_settings' => 'Profile Settings',
'Not_hold_doctoral_degree' => 'For instructors who do not hold a doctoral degree, please specify.',
'Update_button' => 'Update',
'Password_settings' => 'Password Settings',
'Old_password' => 'Old password',
'New_password' => 'New password',
'Confirm_new_password' => 'Confirm new password',
'Expertise_title' => 'Expertise',
'Add_expertise_button' => 'Add Expertise',
'Expertise_title_form' => 'Expertise',
'Expertise_placeholder_form' => 'Enter Expertise',
'Submit_button' => 'Submit',
'Cancle_button' => 'Cancle',
'Education_title' => 'Education',
'Bachelor_degree_title' => 'Bachelor\'s degree',
'Master_degree_title' => 'Master\'s degree',
'Doctoral_degree_title' => 'Doctoral degree',
'University_name' => 'University',
'Degree_title' => 'Degree',
'Year_graduation' => 'Year of graduation',

// ส่วนของ Option
'Option_navbar_title' => 'Option',

// ส่วนของ Manage Fund
'Manage_Fund_navbar_title' => 'Manage Fund',

// ส่วน Manage Fund (index.blade.php)
'Research_grant' => 'Research Grant',
'Add_research_grant' => 'Add',
'Fund_no' => 'No.',
'Fund_name' => 'Fund Name',
'Fund_type' => 'Fund Type',
'Fund_level' => 'Fund Level',
'Fund_action' => 'Action',
'No_data_avalible' => 'No data available in table',
'info' => 'Showing _START_ to _END_ of _TOTAL_ entries',
'infoEmpty' => 'Showing 0 to 0 of 0 entries',
'infoFiltered' => '(filtered from _MAX_ total entries)',
'lengthMenu' => 'Show _MENU_ entries',
'search' => 'Search:',
'internal_fund' => 'Internal Fund',
'external_fund' => 'External Fund',

// ส่วน Manage Fund (show.blade.php)
'Fund_detail' => 'Fund Detail',
'Fund_detail_description' => 'Description of the fund',
'Fund_year' => 'Year',
'Fund_organization' => 'Organization',
'Add_detail_fund_by' => 'Add detail fund by',
'Back_button' => 'Back',

// ส่วน Manage Fund (create.blade.php)
'error_input' => [
    'Whoops' => 'Whoops!',
    'Error_problem' => 'There were some problems with your input.',
],
'Add_research_fund' => 'Add Research Fund',
'Input_research_fund_detail' => 'Input Research Fund Detail',
'Please_choose_fund_type' => 'Please choose the fund type',
'Please_choose_fund_level' => 'Please choose the fund level',
'Organization_support' => 'Organization support / Research Project',
'Fund_level_not_define' => 'Not Define',
'Fund_level_low' => 'Low',
'Fund_level_medium' => 'Medium',
'Fund_level_high' => 'High',

// ส่วน Manage Fund (edit.blade.php)
'Edit_fund' => 'Edit Fund',
'Edit_research_fund_detail' => 'Edit Research Fund Detail',

// ส่วน Manage Fund (การ Delete)
'Fund_warning_delete' => [
    'warning_title' => 'Are you sure?',
    'warning_text' => 'If you delete this, it will be gone forever.',
],

// ส่วนของ Research Project
'Research_Project_navbar_title' => 'Research Project',
// ส่วนของ Research Project (index.blade.php)
'Add_research_project' => 'Add',
'Research_project_no' => 'No.',
'Research_project_year' => 'Year',
'Research_project_name' => 'Project Name',
'Research_project_head' => 'Head',
'Research_project_member' => 'Member',
'Research_project_action' => 'Action',

// ส่วนของ Research Projects (show.blade.php)
'Research_project_detail' => 'Research Projects Detail',
'Research_project_description' => 'Description of the project',
'Research_project_start' => 'Start Date',
'Research_project_end' => 'End Date',
'Research_project_budget' => 'Budget',
'Research_project_note' => 'Note',
'Research_project_status' => [
    'Title' => 'Status',
    'Request' => 'Request',
    'Progress' => 'In Progress',
    'Close' => 'Close',
],
'Research_project_responsible' => 'Project Responsible',

// ส่วนของ Research Projects (create.blade.php)
'Input_research_project_detail' => 'Input Research Project Detail',
'Please_choose_fund' => 'Choose the fund',
'Year_submission' => 'Year of submission (AD)',
'Budget_baht_placeholder' => 'Budget in Baht',
'Responsible_department' => 'Responsible Department',
'Select_department_option' => 'Select Department',
'Please_choose_status' => 'Please choose the status',
'Select_user_option' => 'Select User',
'Internal_co-project_manager' => 'Internal Co-Project Manager',
'External_co-project_manager' => 'External Co-Project Manager',
'Postion_or_prefix' => 'Position or Prefix',
'First_name' => 'First Name',
'Last_name' => 'Last Name',
'Add_more_person' => 'Add more person',
'Record_inserted_successfully' => 'Record inserted successfully',
'Cant_remove_first_row' => 'Sorry!! Can\'t remove first row!',


// ส่วนของ Research Projects (edit.blade.php)
'Edit_research_project' => 'Edit Research Project',
'Edit_research_project_detail' => 'Edit Research Project Detail',

// ส่วนของ Research Group
'Research_Group_navbar_title' => 'Research Group',

// ส่วนของ Research Group (index.blade.php)
'Add_research_group' => 'Add',
'Research_group_no' => 'No.',
'Research_group_name' => 'Group Name',
'Research_group_head' => 'Head',
'Research_group_member' => 'Member',
'Research_group_action' => 'Action',

// ส่วนของ Research Group (show.blade.php)
'Research_group_detail' => 'Research Group Detail',
'Research_group_description' => 'Description of the group',
'Research_group_name_th' => 'Group Name (TH)',
'Research_group_name_en' => 'Group Name (EN)',
'Research_group_description_th' => 'Description (TH)',
'Research_group_description_en' => 'Description (EN)',
'Research_group_detail_th' => 'Detail (TH)',
'Research_group_detail_en' => 'Detail (EN)',
'Research_group_head' => 'Head',
'Research_group_member' => 'Member',

// ส่วนของ Research Group (create.blade.php)
'Create_research_group' => 'Create Research Group',
'Input_research_group_detail' => 'Input Research Group Detail',
'Research_group_image' => 'Research Group Image',
'Department_name' => 'Department of Computer Science',

// ส่วนของ Research Group (edit.blade.php)
'Edit_research_group' => 'Edit Research Group',
'Edit_research_group_detail' => 'Edit Research Group Detail',

// ส่วนของ Manage Publication
'Manage_Publication_navbar_title' => 'Manage Publications',

// ส่วนของ Published research
'Published_research_navbar_title' => 'Published research',

// ส่วนของ Published research (index.blade.php)
'Add_published_research' => 'Add',
'Call_paper_allAPI' => 'Call Paper (All API)',
'Call_paper_scopus' => 'Call Paper (Scopus)',
'Call_paper_googlescholar' => 'Call Paper (Google Scholar)',
'Call_paper_wos' => 'Call Paper (Web of Science)',
'Published_research_no' => 'No.',
'Published_research_title' => 'Title',
'Published_research_type' => 'Type',
'Published_research_year' => 'Year',
'Published_research_API_fetch_date' => 'API Fetch Date',
'Published_research_action' => 'Action',
'Published_research_journal' => 'Journal',
'Published_research_conference' => 'Conference Proceeding',
'Published_research_book_series' => 'Book Series',
'Published_research_book' => 'Book',

// ส่วนของ Published research (show.blade.php)
'Published_research_detail' => 'Published Research Detail',
'Published_research_description' => 'Description of the research',
'Published_research_abstract' => 'Abstract',
'Published_research_keyword' => 'Keyword',
'Published_research_journalType' => 'Journal Type',
'Published_research_documentType' => 'Document Type',
'Published_research_publication' => 'Publication',
'Published_research_author' => 'Author',
'Published_research_first_author' => 'First Author',
'Published_research_co_author' => 'Co-Author',
'Published_research_corresponding_author' => 'Corresponding Author',
'Published_research_journalName' => 'Journal Name',
'Published_research_volume' => 'Volume',
'Published_research_issue' => 'Issue',
'Published_research_page' => 'Page',
'Published_research_doi' => 'DOI',
'Published_research_url' => 'URL',

// ส่วนของ Published research (create.blade.php)
'Create_published_research' => 'Create Published Research',
'Input_published_research_detail' => 'Input Published Research Detail',
'Published_research_source' => 'Research Publication Source',
'Published_research_keyword_suggested' => 'Each word must be separated by a semicolon (;) and followed by one space.',
'Choose_paper_type' => 'Choose Paper Type',
'Choose_paper_subtype' => 'Choose Paper Subtype',
'Choose_publication' => 'Choose Publication',
'Published_research_citation_count' => 'Citation Count',
'Published_research_funder' => 'Funder',
'Published_research_internal_author' => 'Author Name (Internal Author)',
'Published_research_external_author' => 'Author Name (External Author)',
'Enter_your_name' => 'Enter your name',

'Published_research_document_type_article' => 'Article',
'Published_research_document_type_conference' => 'Conference Paper',
'Published_research_document_type_editorial' => 'Editorial',
'Published_research_document_type_bookchapter' => 'Book Chapter',
'Published_research_document_type_erratum' => 'Erratum',
'Published_research_document_type_review' => 'Review',

'Published_research_publication_international_journal' => 'International Journal',
'Published_research_publication_international_book' => 'International Book',
'Published_research_publication_international_conference' => 'International Conference',
'Published_research_publication_national_conference' => 'National Conference',
'Published_research_publication_national_journal' => 'National Journal',
'Published_research_publication_national_book' => 'National Book',
'Published_research_publication_national_magazine' => 'National Magazine',
'Published_research_publication_book_chapter' => 'Book Chapter',

// ส่วนของ Published research (edit.blade.php)
'Edit_published_research' => 'Edit Published Research',
'Edit_published_research_detail' => 'Edit Published Research Detail',

// ส่วนของ Book
'Book_navbar_title' => 'Book',

// ส่วนของ Book (index.blade.php)
'Add_book' => 'Add',
'Book_no' => 'No.',
'Book_title' => 'Title',
'Book_year' => 'Year (B.E.)',
'Book_source' => 'Source',
'Book_page' => 'Page',
'Book_action' => 'Action',

// ส่วนของ Book (show.blade.php)
'Book_detail' => 'Book Detail',
'Book_description' => 'Description of the book',

// ส่วนของ Book (create.blade.php)
'Create_book' => 'Create Book',
'Input_book_detail' => 'Input Book Detail',

// ส่วนของ Book (edit.blade.php)
'Edit_book' => 'Edit Book',
'Edit_book_detail' => 'Edit Book Detail',


// ส่วนของ ผลงานวิชาการอื่นๆ
'Other_academic_works_navbar_title' => 'Other academic works',

// ส่วนของ ผลงานวิชาการอื่นๆ (index.blade.php)
'Other_academic_works_header' => 'Other Academic Works (Patents, Utility Models, Copyrights)',
'Add_other_academic_works' => 'Add',
'Other_academic_works_no' => 'No.',
'Other_academic_works_title' => 'Title',
'Other_academic_works_type' => 'Type',
'Other_academic_registration_date' => 'Registration Date',
'Other_academic_registration_no' => 'Registration No.',
'Other_academic_works_author' => 'Author',
'Other_academic_works_action' => 'Action',
'Delete_successfully' => 'Delete successfully',

// ส่วนของ ผลงานวิชาการอื่นๆ (show.blade.php)
'Other_academic_works_detail' => 'Other Academic Works Detail (Patents, Utility Models, Copyrights)',
'Other_academic_works_description' => 'Description of the works (Patents, Utility Models, Copyrights)',
'Other_academic_works_co-author' => 'Co-Author',
'Other_academic_registration_number' => 'Number',

// ส่วนของ ผลงานวิชาการอื่นๆ (create.blade.php)
'Create_other_academic_works' => 'Create Other Academic Works',
'Input_other_academic_works_detail' => 'Input Other Academic Works Detail (Patents, Utility Models, Copyrights)',
'Other_academic_works_create_title' => 'Title (Patent, Utility Model, Copyright)',
'Other_academic_works_choose_type' => 'Choose Type',
'Other_academic_works_date_copyright' => 'Date of Copyright',
'Other_academic_works_teacher_in_field' => 'Teacher in the field',
'Other_academic_works_outsider' => 'Outsider',

'Other_academic_works_Patent' => 'Patent',
'Other_academic_works_Patent_Invention' => 'Patent (Invention)',
'Other_academic_works_Patent_ProductDesign' => 'Patent (Product Design)',
'Other_academic_works_UtilityModel' => 'Utility Model',
'Other_academic_works_Copyright' => 'Copyright',
'Other_academic_works_Copyright_LiteraryWork' => 'Copyright (Literary)',
'Other_academic_works_Copyright_Music' => 'Copyright (Music)',
'Other_academic_works_Copyright_Film' => 'Copyright (Film)',
'Other_academic_works_Copyright_Art' => 'Copyright (Art)',
'Other_academic_works_Copyright_Broadcast' => 'Copyright (Broadcasting)',
'Other_academic_works_Copyright_AudioVisualWork' => 'Copyright (Audiovisual Works)',
'Other_academic_works_Copyright_Other_Works' => 'Copyright (Other Works in Literature/Science/Art)',
'Other_academic_works_Copyright_SoundRecording' => 'Copyright (Sound Recording)',
'Other_academic_works_other' => 'Other',
'Other_academic_works_Trade_Secret' => 'Trade Secret',
'Other_academic_works_Trade_Mark' => 'Trademark',


// ส่วนของ ผลงานวิชาการอื่นๆ (edit.blade.php)
'Edit_other_academic_works' => 'Edit Other Academic Works',
'Edit_other_academic_works_detail' => 'Edit Other Academic Works Detail',
];

