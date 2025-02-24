<?php
return [
'Home' => '主页',
'Researchers' => '研究人员',
'ResearchProj' => '研究项目',
'ResearchGroup' => '研究小组',
'Report' => '报告',
'details' =>'更多细节',
'expertise' => '研究兴趣',
'publications' => '出版物（过去5年）',
'education'=>'教育',
'publications2' => '出版物',

// ส่วนของ Login
'Account_Login' => '帐户登录',
'Username' => '用户名',
'Password' => '密码',
'Remember_me' => '记住我',
'Login_button' => '登录',
'Forgot_password' => '*** 如果您忘记密码，请联系管理员',
'Username_kkumail' => '使用KKU-Mail登录用户名',
'Student_first_time_login' => '首次登录的学生，请使用学生ID登录',
'Login_failed' => '登录失败：您的用户名或密码不正确',
'required' => [
        'username' => '需要用户名',
        'password' => '需要密码'
],

// ส่วนของ Pagination
'Previous' => '上一页',
'Next' => '下一页',


// ========================================== ส่วนของ Admin (ผู้วิจัย) ==========================================

// ส่วน Navbar
'Project_title' => '研究信息管理系统',
'Search_here' => '在这里搜索',
'Logout' => '登出',

// ส่วนของหน้า Dashboard
'Welcome' => '欢迎来到研究信息管理系统',
'Welcome_hello' => '你好',
'Dashboard_navbar_title' => '仪表板',

// ส่วนของ Profile
'Profile_navbar_title' => '个人资料',

// ส่วนของ User Profile
'User_Profile_navbar_title' => '用户资料',
'Change_picture' => '更改图片',
'User_profile_picture' => '用户资料图片',
'Account_tab' => '帐户',
'Password_tab' => '密码',
'Expertise_tab' => '专长',
'Education_tab' => '教育',
'Profile_settings' => '个人资料设置',
'Not_hold_doctoral_degree' => '对于没有博士学位的讲师，请指定。',
'Update_button' => '更新',
'Password_settings' => '密码设置',
'Old_password' => '旧密码',
'New_password' => '新密码',
'Confirm_new_password' => '确认新密码',
'Expertise_title' => '专长',
'Add_expertise_button' => '添加专长',
'Expertise_title_form' => '专长',
'Expertise_placeholder_form' => '输入专长',
'Submit_button' => '提交',
'Cancle_button' => '取消',
'Education_title' => '教育',
'Bachelor_degree_title' => '学士学位',
'Master_degree_title' => '硕士学位',
'Doctoral_degree_title' => '博士学位',
'University_name' => '大学名称',
'Degree_title' => '学位',
'Year_graduation' => '毕业年份',

// ส่วนของ Option
'Option_navbar_title' => '选项',

// ส่วนของ Manage Fund
'Manage_Fund_navbar_title' => '管理基金',

// ส่วน Manage Fund (index.blade.php)
'Research_grant' => '研究基金',
'Add_research_grant' => '添加',
'Fund_no' => '编号',
'Fund_name' => '基金名称',
'Fund_type' => '基金类型',
'Fund_level' => '基金级别',
'Fund_action' => '操作',
'No_data_avalible' => '表中无可用数据',
'info' => '显示 _START_ 至 _END_ 项结果，共 _TOTAL_ 项',
'infoEmpty' => '显示 0 至 0 项结果，共 0 项',
'infoFiltered' => '(由 _MAX_ 项结果过滤)',
'lengthMenu' => '显示 _MENU_ 项结果',
'search' => '搜索:',
'internal_fund' => '内部基金',
'external_fund' => '外部基金',

// ส่วน Manage Fund (show.blade.php)
'Fund_detail' => '基金详情',
'Fund_detail_description' => '基金描述',
'Fund_year' => '年份',
'Fund_organization' => '组织',
'Add_detail_fund_by' => '添加详细基金',
'Back_button' => '返回',

// ส่วน Manage Fund (create.blade.php)
'error_input' => [
    'Whoops' => '哎呀！',
    'Error_problem' => '您输入的数据存在问题',
],
'Add_research_fund' => '添加研究基金',
'Input_research_fund_detail' => '输入研究基金详情',
'Please_choose_fund_type' => '请选择基金类型',
'Please_choose_fund_level' => '请选择基金级别',
'Organization_support' => '支持组织/研究项目',
'Fund_level_not_define' => '未定义',
'Fund_level_low' => '低',
'Fund_level_medium' => '中',
'Fund_level_high' => '高',

// ส่วน Manage Fund (edit.blade.php)
'Edit_fund' => '编辑基金',
'Edit_research_fund_detail' => '编辑研究基金详情',

// ส่วน Manage Fund (การ Delete)
'Fund_warning_delete' => [
    'warning_title' => '您确定要删除此基金吗？',
    'warning_text' => '您将无法恢复已删除的数据！',
],

// ส่วนของ Research Project
'Research_Project_navbar_title' => '研究项目',
// ส่วนของ Research Project (index.blade.php)
'Add_research_project' => '添加',
'Research_project_no' => '编号',
'Research_project_year' => '年份',
'Research_project_name' => '项目名称',
'Research_project_head' => '负责人',
'Research_project_member' => '成员',
'Research_project_action' => '操作',

// ส่วนของ Research Projects (show.blade.php)
'Research_project_detail' => '项目详情',
'Research_project_description' => '项目描述',
'Research_project_start' => '开始日期',
'Research_project_end' => '结束日期',
'Research_project_budget' => '预算',
'Research_project_note' => '备注',
'Research_project_status' => [
    'Title' => '状态',
    'Request' => '请求',
    'Progress' => '进行中',
    'Close' => '关闭',
],
'Research_project_responsible' => '项目负责人',

// ส่วนของ Research Projects (create.blade.php)
'Input_research_project_detail' => '输入研究项目详情',
'Please_choose_fund' => '选择基金',
'Year_submission' => '提交年份（公元）',
'Budget_baht_placeholder' => '预算（泰铢）',
'Responsible_department' => '负责部门',
'Select_department_option' => '选择部门',
'Please_choose_status' => '请选择状态',
'Select_user_option' => '选择用户',
'Internal_co-project_manager' => '项目负责人（合作）内部',
'External_co-project_manager' => '项目负责人（合作）外部',
'Postion_or_prefix' => '职位或前缀',
'First_name' => '名字',
'Last_name' => '姓氏',
'Add_more_person' => '添加更多人员',
'Record_inserted_successfully' => '记录已成功插入',
'Cant_remove_first_row' => '抱歉！无法删除第一行！',

// ส่วนของ Research Projects (edit.blade.php)
'Edit_research_project' => '编辑研究项目',
'Edit_research_project_detail' => '编辑研究项目详情',

// ส่วนของ Research Group
'Research_Group_navbar_title' => '研究小组',

// ส่วนของ Research Group (index.blade.php)
'Add_research_group' => '添加',
'Research_group_no' => '编号',
'Research_group_name' => '小组名称',
'Research_group_head' => '负责人',
'Research_group_member' => '成员',
'Research_group_action' => '操作',

// ส่วนของ Research Group (show.blade.php)
'Research_group_detail' => '小组详情',
'Research_group_description' => '小组描述',
'Research_group_name_th' => '小组名称（泰文）',
'Research_group_name_en' => '小组名称（英文）',
'Research_group_description_th' => '小组描述（泰文）',
'Research_group_description_en' => '小组描述（英文）',
'Research_group_detail_th' => '小组详情（泰文）',
'Research_group_detail_en' => '小组详情（英文）',
'Research_group_head' => '负责人',
'Research_group_member' => '成员',

// ส่วนของ Research Group (create.blade.php)
'Create_research_group' => '创建研究小组',
'Input_research_group_detail' => '输入研究小组详情',
'Research_group_image' => '研究小组图片',
'Department_name' => '部门名称',

// ส่วนของ Research Group (edit.blade.php)
'Edit_research_group' => '编辑研究小组',
'Edit_research_group_detail' => '编辑研究小组详情',


// ส่วนของ Manage Publication
'Manage_Publication_navbar_title' => '管理出版物',

// ส่วนของ Published research
'Published_research_navbar_title' => '已发表的研究',

// ส่วนของ Published research (index.blade.php)
'Add_published_research' => '添加',
'Call_paper_allAPI' => '调用论文（所有API）',
'Call_paper_scopus' => '调用论文（Scopus）',
'Call_paper_googlescholar' => '调用论文（Google Scholar）',
'Call_paper_wos' => '调用论文（Web of Science）',
'Published_research_no' => '编号',
'Published_research_title' => '标题',
'Published_research_type' => '类型',
'Published_research_year' => '发表年份',
'Published_research_API_fetch_date' => 'API提取日期',
'Published_research_action' => '操作',
'Published_research_journal' => '期刊',
'Published_research_conference' => '会议',
'Published_research_book_series' => '书籍系列',
'Published_research_book' => '书籍',

// ส่วนของ Published research (show.blade.php)
'Published_research_detail' => '已发表研究详情',
'Published_research_description' => '研究描述',
'Published_research_abstract' => '摘要',
'Published_research_keyword' => '关键词',
'Published_research_journalType' => '期刊类型',
'Published_research_documentType' => '文档类型',
'Published_research_publication' => '出版物',
'Published_research_author' => '作者',
'Published_research_first_author' => '第一作者',
'Published_research_co_author' => '合著者',
'Published_research_corresponding_author' => '通讯作者',
'Published_research_journalName' => '期刊名称',
'Published_research_volume' => '卷',
'Published_research_issue' => '问题',
'Published_research_page' => '页',
'Published_research_doi' => 'DOI（数字对象标识符）',
'Published_research_url' => 'URL（统一资源定位符）',

// ส่วนของ Published research (create.blade.php)
'Create_published_research' => '创建已发表研究',
'Input_published_research_detail' => '输入已发表研究详情',
'Published_research_source' => '来源',
'Published_research_keyword_suggested' => '每个关键词必须用逗号 (,) 分隔',
'Choose_paper_type' => '选择论文类型',
'Choose_paper_subtype' => '选择论文子类型',
'Choose_publication' => '选择出版物',
'Published_research_citation_count' => '引用次数',
'Published_research_funder' => '资助方',
'Published_research_internal_author' => '作者（内部）',
'Published_research_external_author' => '作者（外部）',
'Enter_your_name' => '输入您的名字',

'Published_research_document_type_article' => '文章',
'Published_research_document_type_conference' => '会议论文',
'Published_research_document_type_editorial' => '社论',
'Published_research_document_type_bookchapter' => '书籍章节',
'Published_research_document_type_erratum' => '更正',
'Published_research_document_type_review' => '综述',

'Published_research_publication_international_journal' => '国际期刊',
'Published_research_publication_international_book' => '国际书籍',
'Published_research_publication_international_conference' => '国际会议',
'Published_research_publication_national_conference' => '国家会议',
'Published_research_publication_national_journal' => '国家期刊',
'Published_research_publication_national_book' => '国家书籍',
'Published_research_publication_national_magazine' => '国家杂志',
'Published_research_publication_book_chapter' => '书籍章节',

// ส่วนของ Published research (edit.blade.php)
'Edit_published_research' => '编辑已发表研究',
'Edit_published_research_detail' => '编辑已发表研究详情',

// ส่วนของ Book
'Book_navbar_title' => '书籍',

// ส่วนของ Book (index.blade.php)
'Add_book' => '添加',
'Book_no' => '编号',
'Book_title' => '标题',
'Book_year' => '出版年份',
'Book_source' => '来源',
'Book_page' => '页数',
'Book_action' => '操作',

// ส่วนของ Book (show.blade.php)
'Book_detail' => '书籍详情',
'Book_description' => '书籍描述',

// ส่วนของ Book (create.blade.php)
'Create_book' => '创建书籍',
'Input_book_detail' => '输入书籍详情',

// ส่วนของ Book (edit.blade.php)
'Edit_book' => '编辑书籍',
'Edit_book_detail' => '编辑书籍详情',

// ส่วนของ ผลงานวิชาการอื่นๆ
'Other_academic_works_navbar_title' => '其他学术作品',

// ส่วนของ ผลงานวิชาการอื่นๆ (index.blade.php)
'Other_academic_works_header' => '其他学术作品',
'Add_other_academic_works' => '添加',
'Other_academic_works_no' => '编号',
'Other_academic_works_title' => '标题',
'Other_academic_works_type' => '类型',
'Other_academic_registration_date' => '注册日期',
'Other_academic_registration_no' => '注册编号',
'Other_academic_works_author' => '作者',
'Other_academic_works_action' => '操作',
'Delete_successfully' => '删除成功',

// ส่วนของ ผลงานวิชาการอื่นๆ (show.blade.php)
'Other_academic_works_detail' => '其他学术成果详情（专利、实用新型、版权）',
'Other_academic_works_description' => '成果描述（专利、实用新型、版权）',
'Other_academic_works_co-author' => '共同作者',
'Other_academic_registration_number' => '编号',

// ส่วนของ ผลงานวิชาการอื่นๆ (create.blade.php)
'Create_other_academic_works' => '创建其他学术作品',
'Input_other_academic_works_detail' => '输入其他学术作品详情 (专利、实用新型、版权)',
'Other_academic_works_create_title' => '其他学术作品 (专利、实用新型、版权)',
'Other_academic_works_choose_type' => '选择类型',
'Other_academic_works_date_copyright' => '版权日期',
'Other_academic_works_teacher_in_field' => '领域内的教师',
'Other_academic_works_outsider' => '外部人员 (合作)',

'Other_academic_works_Patent' => '专利',
'Other_academic_works_Patent_Invention' => '专利 (发明)',
'Other_academic_works_Patent_ProductDesign' => '专利 (产品设计)',
'Other_academic_works_UtilityModel' => '实用新型',
'Other_academic_works_Copyright' => '版权',
'Other_academic_works_Copyright_LiteraryWork' => '版权 (文学作品)',
'Other_academic_works_Copyright_Music' => '版权 (音乐)',
'Other_academic_works_Copyright_Film' => '版权 (电影)',
'Other_academic_works_Copyright_Art' => '版权 (艺术)',
'Other_academic_works_Copyright_Broadcast' => '版权 (广播)',
'Other_academic_works_Copyright_AudioVisualWork' => '版权 (视听作品)',
'Other_academic_works_Copyright_Other_Works' => '版权 (其他作品)',
'Other_academic_works_Copyright_SoundRecording' => '版权 (声音录制)',
'Other_academic_works_other' => '其他',
'Other_academic_works_Trade_Secret' => '商业秘密',
'Other_academic_works_Trade_Mark' => '商标',

// ส่วนของ ผลงานวิชาการอื่นๆ (edit.blade.php)
'Edit_other_academic_works' => '编辑其他学术作品',
'Edit_other_academic_works_detail' => '编辑其他学术作品详情',
];