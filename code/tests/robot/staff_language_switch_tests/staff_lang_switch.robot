*** Settings ***
Library    SeleniumLibrary
Suite Setup     Open Browser To Login Page
Suite Teardown  Logout And Close Browser

*** Variables ***
${URL}          http://127.0.0.1:8000/login  # URL ของหน้า Login
${DASHBOARD_URL}        http://127.0.0.1:8000/dashboard
${DASHBOARD_PATH}        xpath=//a[contains(@href, '/dashboard')]
${BROWSER}      chrome                       # Browser ที่ใช้ทดสอบ
${DELAY}        0.5                            # Delay ระหว่างขั้นตอน
${USERNAME}             staff@gmail.com
${PASSWORD}             123456789
${LANG_DROPDOWN}    id=navbarDropdownMenuLink
${LANG_MENU}    css=#navbarDropdownMenuLink + .dropdown-menu
${THAI_LANG}    xpath=//a[contains(@href, '/lang/th')]
${ENG_LANG}    xpath=//a[contains(@href, '/lang/en')]
${CN_LANG}    xpath=//a[contains(@href, '/lang/cn')]
${PROFILE_URL}    xpath=//a[contains(@href, '/profile')]
${ACCOUNT_TAB}    id=account-tab
${PASSWORD_TAB}    id=password-tab
${EXPERTISE_TAB}    id=expertise-tab
${EDUCATION_TAB}    id=education-tab
${MANAGE_FUND_URL}    xpath=//a[contains(@href, '/funds')]
${CREATE_MANAGE_FUND_URL}    xpath=//a[contains(@href, '/funds/create')]
${SHOW_FUND_DEMO_URL}    xpath=//a[contains(@href, '/funds/2')]
${RESEARCH_PROJECT_URL}    xpath=//a[contains(@href, '/researchProjects')]
${CREATE_RESEARCH_PROJECT_URL}    xpath=//a[contains(@href, '/researchProjects/create')]
${SHOW_RESEARCH_PROJECT_DEMO_URL}    xpath=//a[contains(@href, '/researchProjects/16')]
${RESEARCH_GROUP_URL}    xpath=//a[contains(@href, '/researchGroups')]
${CREATE_RESEARCH_GROUP_URL}    xpath=//a[contains(@href, '/researchGroups/create')]
${SHOW_RESEARCH_GROUP_DEMO_URL}    xpath=//a[contains(@href, '/researchGroups/3')]
${PUBLISHED_RESEARCH_URL}    xpath=//a[contains(@href, '/papers')]
${CREATE_PUBLISHED_RESEARCH_URL}    xpath=//a[contains(@href, '/papers/create')]
${SHOW_PUBLISHED_RESEARCH_DEMO_URL}    xpath=//a[contains(@href, '/papers/1')]
${BOOK_URL}    xpath=//a[contains(@href, '/books')]
${CREATE_BOOK_URL}    xpath=//a[contains(@href, '/books/create')]
${SHOW_BOOK_DEMO_URL}    xpath=//a[contains(@href, '/books/14')]
${OTHER_ACADEMIC_WORK_URL}    xpath=//a[contains(@href, '/patents')]
${CREATE_OTHER_ACADEMIC_WORK_URL}    xpath=//a[contains(@href, '/patents/create')]
${SHOW_OTHER_ACADEMIC_WORK_DEMO_URL}    xpath=//a[contains(@href, '/patents/37')]
${DEPARTMENT_URL}    xpath=//a[contains(@href, '/departments')]
${CREATE_DEPARTMENT_URL}    xpath=//a[contains(@href, '/departments/create')]
${SHOW_DEPARTMENT_DEMO_URL}    xpath=//a[contains(@href, '/departments/1')]
${MANAGE_PROGRAM_URL}    xpath=//a[contains(@href, '/programs')]
${CREATE_MANAGE_PROGRAM_URL}    id=new-program

*** Test Cases ***
Verify Language Switcher Presence    
    Wait Until Element Is Visible    ${LANG_DROPDOWN}
    Element Should Be Visible    ${LANG_DROPDOWN}    

Verify Language Options Display    
    Wait Until Element Is Visible    ${LANG_DROPDOWN}
    Click Element    ${LANG_DROPDOWN}
    Wait Until Element Is Visible    ${LANG_MENU}
    Element Should Be Visible    ${THAI_LANG}    
    Element Should Be Visible    ${CN_LANG}       

# =================== English Language Tests ===================
Verify English Dashboard Page
    Verify Dashboard Page English

Verify English Profile Page
    Verify Profile Page English

Verify English Manage Fund Page
    Verify Manage Fund Page English  

Verify English Research Project Page
    Verify Research Project Page English  

Verify English Research Group Page
    Verify Research Group Page English  

Verify English Published Research Page
    Verify Published Research Page English  

Verify English Book Page
    Verify Book Page English  

Verify English Other Academic Works Page
    Verify Other Academic Works Page English  

Verify English Department Page
    Verify Department Page English  

Verify English Manage Program Page
    Verify Manage Program Page English  

# =================== Thai Language Tests ===================
Verify Thai Dashboard Page
    Verify Dashboard Page Thai

Verify Thai Profile Page
    Verify Profile Page Thai

Verify Thai Manage Fund Page
    Verify Manage Fund Page Thai  

Verify Thai Research Project Page
    Verify Research Project Page Thai  

Verify Thai Research Group Page
    Verify Research Group Page Thai  

Verify Thai Published Research Page
    Verify Published Research Page Thai  

Verify Thai Book Page
    Verify Book Page Thai  

Verify Thai Other Academic Works Page
    Verify Other Academic Works Page Thai  

Verify Thai Department Page
    Verify Department Page Thai  

Verify Thai Manage Program Page
    Verify Manage Program Page Thai  

# =================== Chinese Language Tests ===================
Verify Chinese Dashboard Page
    Verify Dashboard Page Chinese

Verify Chinese Profile Page
    Verify Profile Page Chinese
    
Verify Chinese Manage Fund Page
    Verify Manage Fund Page Chinese  

Verify Chinese Research Project Page
    Verify Research Project Page Chinese

Verify Chinese Research Group Page
    Verify Research Group Page Chinese

Verify Chinese Published Research Page
    Verify Published Research Page Chinese  

Verify Chinese Book Page
    Verify Book Page Chinese  

Verify Chinese Other Academic Works Page
    Verify Other Academic Works Page Chinese  

Verify Chinese Department Page
    Verify Department Page Chinese  

Verify Chinese Manage Program Page
    Verify Manage Program Page Chinese  

*** Keywords ***
Open Browser To Login Page
    Open Browser    ${URL}    ${BROWSER}
    Maximize Browser Window
    Set Selenium Speed    ${DELAY}
    Login To System

Login To System
    Wait Until Page Contains Element    id=username    0.5s
    Log To Console    Found username field
    Input Text    id=username    ${USERNAME}
    Input Text    id=password    ${PASSWORD}
    Click Button    xpath=//button[@type='submit']
    Wait Until Location Contains    ${DASHBOARD_URL}    0.5s
    Log To Console    Login successful, redirected to: ${DASHBOARD_URL}
    Wait Until Page Contains Element    xpath=//a[@class='nav-link dropdown-toggle' and .//span[contains(@class, 'flag-icon')]]    0.5s

Switch Language
    [Arguments]    ${lang}
    Wait Until Element Is Visible    ${LANG_DROPDOWN}
    Click Element    ${LANG_DROPDOWN}
    
    Run Keyword If    '${lang}' == 'th'    Click Element    ${THAI_LANG}
    ...    ELSE IF    '${lang}' == 'en'    Click Element    ${ENG_LANG}
    ...    ELSE IF    '${lang}' == 'cn'    Click Element    ${CN_LANG}
    
    ${flag}=    Set Variable If    '${lang}' == 'th'    th    ${lang}
    Wait Until Element Is Visible    css:#navbarDropdownMenuLink span.flag-icon-${flag}
    
    Log To Console    Switched to language: ${lang}

Logout
    # คลิกที่ปุ่มหรือลิงค์สำหรับ Logout
    Click Element    xpath=//a[contains(@href, '/logout')]    
    Log To Console    Logged out successfully

Logout And Close Browser
    Logout
    Close Browser

# =================== English Language Keywords ===================
Verify Dashboard Page English
    Wait Until Page Contains    Research Information Management System 
    Wait Until Page Contains    Welcome to the Research Information Management System
    Wait Until Page Contains    Hello                     
    Wait Until Page Contains    staff              
    Wait Until Page Contains    Logout

Verify Profile Page English
    Click Element    ${PROFILE_URL}
    Wait Until Page Contains    Change Picture
    # Verify All Tab Title
    Wait Until Page Contains    Account
    Wait Until Page Contains    Password    
    # Verify Account Tab
    Click Element    ${ACCOUNT_TAB}
    Wait Until Page Contains    Profile Setting
    Wait Until Page Contains    Pronouns
    Wait Until Page Contains    First Name (English)
    Wait Until Page Contains    Last Name (English)
    Wait Until Page Contains    First Name (Thai)
    Wait Until Page Contains    Last Name (Thai)
    Wait Until Page Contains    First Name (Chinese)
    Wait Until Page Contains    Last Name (Chinese)
    Wait Until Page Contains    Email    
    Wait Until Page Contains    Update
    # Verify Password Tab
    Click Element    ${PASSWORD_TAB}
    Wait Until Page Contains    Password Settings
    Wait Until Page Contains    Old password
    Wait Until Page Contains    New password
    Wait Until Page Contains    Confirm new password
    Wait Until Page Contains    Update    
    
Verify Manage Fund Page English
    Click Element    ${MANAGE_FUND_URL}
    # Verify index.blade.php
    Wait Until Page Contains    Research Grant
    Wait Until Page Contains     Add
    Wait Until Page Contains    No.
    Wait Until Page Contains    Fund Name
    Wait Until Page Contains    Fund Type
    Wait Until Page Contains    Fund Level
    Wait Until Page Contains    Search:
    Wait Until Page Contains    Previous
    Wait Until Page Contains    Next    
    # Verify create.blade.php
    Click Element    ${CREATE_MANAGE_FUND_URL}
    Wait Until Page Contains    Add Research Fund
    Wait Until Page Contains    Input Research Fund Detail
    Wait Until Page Contains    Fund Type
    Wait Until Page Contains    Fund Level
    Wait Until Page Contains    Fund Name
    Wait Until Page Contains    Organization support / Research Project (Thai language) 
    Wait Until Page Contains    Supporting Organization/Research Project (EN)     
    Wait Until Page Contains    Supporting Organization/Research Project (CN) 
    Wait Until Page Contains    Submit
    Wait Until Page Contains    Cancel
    # Back to index.blade.php
    Click Element    ${MANAGE_FUND_URL}
    # Verify show.blade.php
    Click Element    ${SHOW_FUND_DEMO_URL}
    Wait Until Page Contains    Fund Detail
    Wait Until Page Contains    Description of the fund
    Wait Until Page Contains    Fund Name
    Wait Until Page Contains    Year
    Wait Until Page Contains    Fund Detail
    Wait Until Page Contains    Fund Type
    Wait Until Page Contains    Fund Level
    Wait Until Page Contains    Organization
    Wait Until Page Contains    Add detail fund by    
    Wait Until Page Contains    Back
    # Back to index.blade.php
    Click Element    ${MANAGE_FUND_URL}
    # Verify Edit.blade.php
    Click Element    xpath=(//a[@title='Edit'])[1]
    Wait Until Page Contains    Edit Fund
    Wait Until Page Contains    Edit Research Fund Detail
    Wait Until Page Contains    Fund Type
    Wait Until Page Contains    Fund Level
    Wait Until Page Contains    Fund Name
    Wait Until Page Contains    Organization support / Research Project (Thai language) 
    Wait Until Page Contains    Supporting Organization/Research Project (EN)     
    Wait Until Page Contains    Supporting Organization/Research Project (CN) 
    Wait Until Page Contains    Submit
    Wait Until Page Contains    Cancel
    # Back to index.blade.php
    Click Element    ${MANAGE_FUND_URL}
    # Verify Delete Message
    Click Element  xpath=//button[@title='Delete']
    Wait Until Page Contains    Are you sure?
    Wait Until Page Contains    If you delete this, it will be gone forever.
    Wait Until Page Contains    Cancel
    Wait Until Page Contains    Submit
    # Back to index.blade.php
    Click Element    xpath=//button[@class='swal-button swal-button--cancel']

Verify Research Project Page English
    Click Element    ${RESEARCH_PROJECT_URL}
    # Verify index.blade.php
    Wait Until Page Contains    Research Project
    Wait Until Page Contains     Add
    Wait Until Page Contains    No.
    Wait Until Page Contains    Year
    Wait Until Page Contains    Project Name
    Wait Until Page Contains    Head
    Wait Until Page Contains    Member
    Wait Until Page Contains    Action
    Wait Until Page Contains    Search:
    Wait Until Page Contains    Previous
    Wait Until Page Contains    Next  
    # Verify create.blade.php
    Click Element    ${CREATE_RESEARCH_PROJECT_URL}
    Wait Until Page Contains    Research Project 
    Wait Until Page Contains    Input Research Project Detail 
    Wait Until Page Contains    Project Name 
    Wait Until Page Contains    Start Date 
    Wait Until Page Contains    End Date 
    Wait Until Page Contains    Choose the fund 
    Wait Until Page Contains    Year of submission (AD) 
    Wait Until Page Contains    Budget 
    Wait Until Page Contains    Responsible Department 
    Wait Until Page Contains    Research Projects Detail 
    Wait Until Page Contains    Status 
    Wait Until Page Contains    Project Responsible 
    Wait Until Page Contains    Internal Co-Project Manager 
    Wait Until Page Contains    External Co-Project Manager 
    Wait Until Page Contains    Submit 
    Wait Until Page Contains    Cancel 
    # Back to index.blade.php
    Click Element    ${RESEARCH_PROJECT_URL}
    # Verify show.blade.php
    Click Element    ${SHOW_RESEARCH_PROJECT_DEMO_URL}
    Wait Until Page Contains    Research Projects Detail
    Wait Until Page Contains    Description of the project
    Wait Until Page Contains    Project Name
    Wait Until Page Contains    Start Date 
    Wait Until Page Contains    End Date 
    Wait Until Page Contains    Fund Name
    Wait Until Page Contains    Budget
    Wait Until Page Contains    Note
    Wait Until Page Contains    Status
    Wait Until Page Contains    Project Responsible
    Wait Until Page Contains    Member
    Wait Until Page Contains    Back
    # Back to index.blade.php
    Click Element    ${RESEARCH_PROJECT_URL}
    # Verify edit.blade.php
    Click Element    xpath=(//a[@title='Edit'])[1]
    Wait Until Page Contains    Edit Research Project
    Wait Until Page Contains    Edit Research Project Detail
    Wait Until Page Contains    Project Name 
    Wait Until Page Contains    Start Date 
    Wait Until Page Contains    End Date 
    Wait Until Page Contains    Choose the fund 
    Wait Until Page Contains    Year of submission (AD) 
    Wait Until Page Contains    Budget 
    Wait Until Page Contains    Responsible Department 
    Wait Until Page Contains    Description of the project
    Wait Until Page Contains    Status 
    Wait Until Page Contains    Project Responsible 
    Wait Until Page Contains    Internal Co-Project Manager 
    Wait Until Page Contains    External Co-Project Manager 
    Wait Until Page Contains    Submit 
    Wait Until Page Contains    Cancel
    # Back to index.blade.php
    Click Element    ${RESEARCH_PROJECT_URL}
    # Verify Delete Message
    Click Element  xpath=//button[@title='Delete']
    Wait Until Page Contains    Are you sure?
    Wait Until Page Contains    If you delete this, it will be gone forever.
    Wait Until Page Contains    Cancel
    Wait Until Page Contains    Submit
    # Back to index.blade.php
    Click Element    xpath=//button[@class='swal-button swal-button--cancel']

Verify Research Group Page English 
    Click Element    ${RESEARCH_GROUP_URL}
    # Verify index.blade.php
    Wait Until Page Contains    Research Group
    Wait Until Page Contains     Add
    Wait Until Page Contains    No.
    Wait Until Page Contains    Group Name
    Wait Until Page Contains    Head
    Wait Until Page Contains    Member
    Wait Until Page Contains    Action
    Wait Until Page Contains    Search:
    Wait Until Page Contains    Previous
    Wait Until Page Contains    Next  
    # Verify create.blade.php
    Click Element    ${CREATE_RESEARCH_GROUP_URL}
    Wait Until Page Contains    Create Research Group
    Wait Until Page Contains    Input Research Group Detail
    Wait Until Page Contains    Group Name (TH)
    Wait Until Page Contains    Group Name (EN)
    Wait Until Page Contains    Research Group Name (CN)
    Wait Until Page Contains    Description (TH)
    Wait Until Page Contains    Description (EN)
    Wait Until Page Contains    Research Group Descriptions (CN)
    Wait Until Page Contains    Detail (TH)
    Wait Until Page Contains    Detail (EN)
    Wait Until Page Contains    Research Group Detail (CN)
    Wait Until Page Contains    Research Group Image
    Wait Until Page Contains    Head
    Wait Until Page Contains    Member
    Wait Until Page Contains    Submit
    Wait Until Page Contains    Back
    # Back to index.blade.php
    Click Element    ${RESEARCH_GROUP_URL}
    # Verify show.blade.php
    Click Element    ${SHOW_RESEARCH_GROUP_DEMO_URL}
    Wait Until Page Contains    Research Group Detail
    Wait Until Page Contains    Description of the group    
    Wait Until Page Contains    Group Name (TH)
    Wait Until Page Contains    Group Name (EN)
    Wait Until Page Contains    Research Group Name (CN)
    Wait Until Page Contains    Description (TH)
    Wait Until Page Contains    Description (EN)
    Wait Until Page Contains    Research Group Descriptions (CN)
    Wait Until Page Contains    Detail (TH)
    Wait Until Page Contains    Detail (EN)
    Wait Until Page Contains    Research Group Detail (CN)    
    Wait Until Page Contains    Head
    Wait Until Page Contains    Member    
    Wait Until Page Contains    Back
    # Back to index.blade.php
    Click Element    ${RESEARCH_GROUP_URL}
    # Verify Edit.blade.php
    Click Element    xpath=(//a[@title='Edit'])[1]
    Wait Until Page Contains    Edit Research Group
    Wait Until Page Contains    Edit Research Group Detail
    Wait Until Page Contains    Group Name (TH)
    Wait Until Page Contains    Group Name (EN)
    Wait Until Page Contains    Research Group Name (CN)
    Wait Until Page Contains    Description (TH)
    Wait Until Page Contains    Description (EN)
    Wait Until Page Contains    Research Group Descriptions (CN)
    Wait Until Page Contains    Detail (TH)
    Wait Until Page Contains    Detail (EN)
    Wait Until Page Contains    Research Group Detail (CN)
    Wait Until Page Contains    Research Group Image
    Wait Until Page Contains    Head
    Wait Until Page Contains    Member
    Wait Until Page Contains    Submit
    Wait Until Page Contains    Cancel
    # Back to index.blade.php
    Click Element    ${RESEARCH_GROUP_URL}
    
Verify Published Research Page English
    Click Element    xpath=//a[@href='#ManagePublications']
    Click Element    ${PUBLISHED_RESEARCH_URL}
    # Verify index.blade.php
    Wait Until Page Contains    Published research
    Wait Until Page Contains    Add
    Wait Until Page Contains    No.
    Wait Until Page Contains    Title
    Wait Until Page Contains    Type
    Wait Until Page Contains    Year
    Wait Until Page Contains    API Fetch Date
    Wait Until Page Contains    Action
    Wait Until Page Contains    Search:
    Wait Until Page Contains    Previous
    Wait Until Page Contains    Next 
    # Verify create.blade.php
    Click Element    ${CREATE_PUBLISHED_RESEARCH_URL}
    Wait Until Page Contains    Create Published Research
    Wait Until Page Contains    Input Published Research Detail
    Wait Until Page Contains    Research Publication Source
    Wait Until Page Contains    Title
    Wait Until Page Contains    Abstract
    Wait Until Page Contains    Keyword
    Wait Until Page Contains    Journal Type
    Wait Until Page Contains    Document Type
    Wait Until Page Contains    Publication
    Wait Until Page Contains    Journal Name
    Wait Until Page Contains    Year
    Wait Until Page Contains    Volume
    Wait Until Page Contains    Issue
    Wait Until Page Contains    Citation Count
    Wait Until Page Contains    Page
    Wait Until Page Contains    DOI
    Wait Until Page Contains    Funder
    Wait Until Page Contains    URL
    Wait Until Page Contains    Author Name (Internal Author)
    Wait Until Page Contains    Author Name (External Author)
    Wait Until Page Contains    Submit
    Wait Until Page Contains    Cancel
    # Back to index.blade.php
    Click Element    xpath=//a[@href='#ManagePublications']
    Click Element    ${PUBLISHED_RESEARCH_URL}
    # Verify show.blade.php
    Click Element    ${SHOW_PUBLISHED_RESEARCH_DEMO_URL}
    Wait Until Page Contains    Published Research Detail
    Wait Until Page Contains    Description of the research
    Wait Until Page Contains    Title
    Wait Until Page Contains    Abstract
    Wait Until Page Contains    Keyword
    Wait Until Page Contains    Journal Type
    Wait Until Page Contains    Document Type
    Wait Until Page Contains    Publication
    Wait Until Page Contains    Author
    Wait Until Page Contains    First Author:
    Wait Until Page Contains    Corresponding Author:
    Wait Until Page Contains    Journal Name
    Wait Until Page Contains    Year
    Wait Until Page Contains    Volume
    Wait Until Page Contains    Issue    
    Wait Until Page Contains    Page
    Wait Until Page Contains    DOI    
    Wait Until Page Contains    URL
    Wait Until Page Contains    Back
    # Back to index.blade.php
    # Click Element    xpath=//a[@href='#ManagePublications']
    Click Element    ${PUBLISHED_RESEARCH_URL}    

Verify Book Page English
    # Click Element    xpath=//a[@href='#ManagePublications']
    Click Element    ${BOOK_URL}
    # Verify index.blade.php
    Wait Until Page Contains    Book
    Wait Until Page Contains    Add
    Wait Until Page Contains    No.
    Wait Until Page Contains    Title
    Wait Until Page Contains    Year (B.E.)
    Wait Until Page Contains    Source(Thai)
    Wait Until Page Contains    Page
    Wait Until Page Contains    Action
    Wait Until Page Contains    Search:
    Wait Until Page Contains    Previous
    Wait Until Page Contains    Next 
    # Verify create.blade.php
    Click Element    ${CREATE_BOOK_URL}
    Wait Until Page Contains    Create Book
    Wait Until Page Contains    Input Book Detail
    Wait Until Page Contains    Title
    Wait Until Page Contains    Source(Thai)
    Wait Until Page Contains    Source(English)
    Wait Until Page Contains    Source(Chinese)
    Wait Until Page Contains    Year (B.E.)
    Wait Until Page Contains    Page
    Wait Until Page Contains    Submit
    Wait Until Page Contains    Cancel
    # Back to index.blade.php
    Click Element    xpath=//a[@href='#ManagePublications']
    Click Element    ${BOOK_URL}
    # Verify show.blade.php
    Click Element    ${SHOW_BOOK_DEMO_URL}
    Wait Until Page Contains    Book Detail
    Wait Until Page Contains    Description of the book
    Wait Until Page Contains    Title
    Wait Until Page Contains    Year (B.E.)
    Wait Until Page Contains    Source(Thai)
    Wait Until Page Contains    Page
    Wait Until Page Contains    Back
    # Back to index.blade.php
    Click Element    xpath=//a[@href='#ManagePublications']
    Click Element    ${BOOK_URL}
    
Verify Other Academic Works Page English  
    # Click Element    xpath=//a[@href='#ManagePublications']
    Click Element    ${OTHER_ACADEMIC_WORK_URL}
    # Verify index.blade.php
    Wait Until Page Contains    Other Academic Works (Patents, Utility Models, Copyrights)
    Wait Until Page Contains    Add
    Wait Until Page Contains    No.
    Wait Until Page Contains    Title
    Wait Until Page Contains    Type
    Wait Until Page Contains    Registration Date
    Wait Until Page Contains    Registration No.
    Wait Until Page Contains    Author
    Wait Until Page Contains    Action
    Wait Until Page Contains    Search:
    Wait Until Page Contains    Previous
    Wait Until Page Contains    Next 
    # Verify create.blade.php
    Click Element    ${CREATE_OTHER_ACADEMIC_WORK_URL}
    Wait Until Page Contains    Create Other Academic Works 
    Wait Until Page Contains    Input Other Academic Works Detail (Patents, Utility Models, Copyrights) 
    Wait Until Page Contains    Title (Patent, Utility Model, Copyright) 
    Wait Until Page Contains    Type 
    Wait Until Page Contains    Date of Copyright 
    Wait Until Page Contains    Registration No. 
    Wait Until Page Contains    Teacher in the field 
    Wait Until Page Contains    Outsider 
    Wait Until Page Contains    First Name 
    Wait Until Page Contains    Last Name 
    Wait Until Page Contains    Submit 
    Wait Until Page Contains    Cancel 
    # Back to index.blade.php
    Click Element    xpath=//a[@href='#ManagePublications']
    Click Element    ${OTHER_ACADEMIC_WORK_URL}
    # Verify show.blade.php
    Click Element    ${SHOW_OTHER_ACADEMIC_WORK_DEMO_URL}
    Wait Until Page Contains    Other Academic Works Detail (Patents, Utility Models, Copyrights)
    Wait Until Page Contains    Description of the works (Patents, Utility Models, Copyrights)
    Wait Until Page Contains    Title
    Wait Until Page Contains    Type
    Wait Until Page Contains    Registration Date
    Wait Until Page Contains    Registration No.
    Wait Until Page Contains    Number
    Wait Until Page Contains    Author
    Wait Until Page Contains    Co-Author
    Wait Until Page Contains    Back
    # Back to index.blade.php
    Click Element    xpath=//a[@href='#ManagePublications']
    Click Element    ${OTHER_ACADEMIC_WORK_URL}

Verify Department Page English
    Click Element    ${DEPARTMENT_URL}
    # Verify index.blade.php
    Wait Until Page Contains    Departments
    Wait Until Page Contains    Department Name
    Wait Until Page Contains    Action
    # Verify create.blade.php
    Click Element    ${CREATE_DEPARTMENT_URL}
    Wait Until Page Contains    Create Department
    Wait Until Page Contains    Department Name (TH)    
    Wait Until Page Contains    Department Name (EN)
    Wait Until Page Contains    Submit  
    Wait Until Page Contains    Back 
    # Back to index.blade.php
    Click Element    ${DEPARTMENT_URL}    
    # Verify show.blade.php
    Click Element    ${SHOW_DEPARTMENT_DEMO_URL}
    Wait Until Page Contains    Department Name (TH) 
    Wait Until Page Contains    Department Name (EN)
    # Wait Until Page Contains    Back
    # Back to index.blade.php    
    Click Element    ${DEPARTMENT_URL}
    # Verify Edit.blade.php
    Click Element    xpath=(//a[@title='Edit'])[1]
    Wait Until Page Contains    Edit Department   
    Wait Until Page Contains    Department Name (TH)
    Wait Until Page Contains    Department Name (EN)  
    Wait Until Page Contains    Submit
    Wait Until Page Contains    Back
    # Back to index.blade.php
    Click Element    ${DEPARTMENT_URL}
    # Verify Delete Message
    Click Element    xpath=(//button[@title='Delete'])[1]
    Wait Until Page Contains    Are you sure?
    Wait Until Page Contains    If you delete this, it will be gone forever.
    Wait Until Page Contains    Cancel
    Wait Until Page Contains    Submit
    # Back to index.blade.php
    Click Element    xpath=//button[@class='swal-button swal-button--cancel']

Verify Manage Program Page English
    # Scroll Element Into View    ${MANAGE_PROGRAM_URL}
    Click Element    ${MANAGE_PROGRAM_URL}
    # Verify index.blade.php
    Wait Until Page Contains    Manage Programs
    Wait Until Page Contains    No.
    Wait Until Page Contains    Program Name
    Wait Until Page Contains    Degree
    Wait Until Page Contains    Action
    Wait Until Page Contains    Search:
    Wait Until Page Contains    Previous
    Wait Until Page Contains    Next    
    # Verify create.blade.php
    # Scroll Element Into View    id=new-program
    Click Element    id=new-program
    Wait Until Page Contains    Add New Program
    Wait Until Page Contains    Degree 
    Wait Until Page Contains    Department Name
    Wait Until Page Contains    Program Name (TH)
    Wait Until Page Contains    Program Name (EN) 
    Wait Until Page Contains    Program Name (CN) 
    Wait Until Page Contains    Submit  
    Wait Until Page Contains    Cancel 
    # Back to index.blade.php
    Click Element    xpath=(//a[contains(@href, '/programs')])[2]
    # Verify Edit.blade.php
    Click Element    xpath=(//a[@title='Edit'])[1]
    Wait Until Page Contains    Edit Program   
    Wait Until Page Contains    Degree
    Wait Until Page Contains    Department Name  
    Wait Until Page Contains    Program Name (TH)
    Wait Until Page Contains    Program Name (EN) 
    Wait Until Page Contains    Program Name (CN) 
    Wait Until Page Contains    Submit
    Wait Until Page Contains    Cancel
    # Back to index.blade.php
    Click Element    xpath=(//a[contains(@href, '/programs')])[2]
    # Verify Delete Message
    Click Element    xpath=(//button[@title='Delete'])[1]
    Wait Until Page Contains    Are you sure?
    Wait Until Page Contains    If you delete this, it will be gone forever.
    Wait Until Page Contains    Cancel
    Wait Until Page Contains    Submit
    # Back to index.blade.php
    Click Element    xpath=//button[@class='swal-button swal-button--cancel']

# =================== Thai Language Keywords ===================
Verify Dashboard Page Thai
    Click Element    ${DASHBOARD_PATH}
    Switch Language    th 
    Wait Until Page Contains    ระบบจัดการข้อมูลวิจัยของสาขาวิชาวิทยาการคอมพิวเตอร์ 
    Wait Until Page Contains    ยินดีต้อนรับเข้าสู่ระบบจัดการข้อมูลวิจัยของสาขาวิชาวิทยาการคอมพิวเตอร์
    Wait Until Page Contains    สวัสดี                     
    Wait Until Page Contains    เจ้าหน้าที่                
    Wait Until Page Contains    ออกจากระบบ

Verify Profile Page Thai
    # Switch Language    th
    Click Element    ${PROFILE_URL}
    Wait Until Page Contains    เปลี่ยนรูปภาพ
    # Verify All Tab Title
    Wait Until Page Contains    บัญชี
    Wait Until Page Contains    รหัสผ่าน    
    # Verify Account Tab
    Click Element    ${ACCOUNT_TAB}
    Wait Until Page Contains    การตั้งค่าโปรไฟล์
    Wait Until Page Contains    คำนำหน้า
    Wait Until Page Contains    ชื่อ (ภาษาอังกฤษ)
    Wait Until Page Contains    นามสกุล (ภาษาอังกฤษ)
    Wait Until Page Contains    ชื่อ (ภาษาไทย)
    Wait Until Page Contains    นามสกุล (ภาษาไทย)
    Wait Until Page Contains    ชื่อ (ภาษาจีน)
    Wait Until Page Contains    นามสกุล (ภาษาจีน)
    Wait Until Page Contains    อีเมล์
    Wait Until Page Contains    อัพเดท
    # Verify Password Tab
    Click Element    ${PASSWORD_TAB}
    Wait Until Page Contains    การตั้งค่ารหัสผ่าน
    Wait Until Page Contains    รหัสผ่านเดิม
    Wait Until Page Contains    รหัสผ่านใหม่
    Wait Until Page Contains    ยืนยันรหัสผ่านใหม่
    Wait Until Page Contains    อัพเดท    

Verify Manage Fund Page Thai
    # Switch Language    th
    Click Element    ${MANAGE_FUND_URL}
    # Verify index.blade.php
    Wait Until Page Contains    ทุนวิจัย
    Wait Until Page Contains    เพิ่ม
    Wait Until Page Contains    ลำดับที่
    Wait Until Page Contains    ชื่อทุน
    Wait Until Page Contains    ประเภททุน
    Wait Until Page Contains    ระดับทุน
    Wait Until Page Contains    ค้นหา:
    Wait Until Page Contains    ย้อนหลัง
    Wait Until Page Contains    ถัดไป    
    # Verify create.blade.php
    Click Element    ${CREATE_MANAGE_FUND_URL}
    Wait Until Page Contains    เพิ่มทุนวิจัย
    Wait Until Page Contains    กรอกรายละเอียดทุนวิจัย
    Wait Until Page Contains    ประเภททุน
    Wait Until Page Contains    ระดับทุน
    Wait Until Page Contains    ชื่อทุน
    Wait Until Page Contains    องค์กรที่สนับสนุน / โครงการวิจัย (ภาษาไทย) 
    Wait Until Page Contains    องค์กรสนับสนุน/โครงการวิจัย (ภาษาอังกฤษ) 
    Wait Until Page Contains    องค์กรสนับสนุน/โครงการวิจัย (ภาษาจีน) 
    Wait Until Page Contains    ยืนยัน
    Wait Until Page Contains    ยกเลิก
    # Back to index.blade.php
    Click Element    ${MANAGE_FUND_URL}
    # Verify show.blade.php
    Click Element    ${SHOW_FUND_DEMO_URL}
    Wait Until Page Contains    รายละเอียดทุน
    Wait Until Page Contains    รายละเอียดของทุน
    Wait Until Page Contains    ชื่อทุน
    Wait Until Page Contains    ปีที่ได้รับทุน
    Wait Until Page Contains    รายละเอียดทุน
    Wait Until Page Contains    ประเภททุน
    Wait Until Page Contains    ระดับทุน
    Wait Until Page Contains    องค์กรที่ให้ทุน
    Wait Until Page Contains    เพิ่มรายละเอียดทุนโดย 
    Wait Until Page Contains    กลับ
    # Back to index.blade.php
    Click Element    ${MANAGE_FUND_URL}
    # Verify Edit.blade.php
    Click Element    xpath=(//a[@title='Edit'])[1]
    Wait Until Page Contains    แก้ไขทุน
    Wait Until Page Contains    แก้ไขรายละเอียดทุน
    Wait Until Page Contains    ประเภททุน
    Wait Until Page Contains    ระดับทุน
    Wait Until Page Contains    ชื่อทุน
    Wait Until Page Contains    องค์กรที่สนับสนุน / โครงการวิจัย (ภาษาไทย)
    Wait Until Page Contains    องค์กรสนับสนุน/โครงการวิจัย (ภาษาอังกฤษ)     
    Wait Until Page Contains    องค์กรสนับสนุน/โครงการวิจัย (ภาษาจีน)
    Wait Until Page Contains    ยืนยัน
    Wait Until Page Contains    ยกเลิก
    # Back to index.blade.php
    Click Element    ${MANAGE_FUND_URL}
    # Verify Delete Message
    Click Element  xpath=//button[@title='Delete']
    Wait Until Page Contains    คุณแน่ใจหรือไม่?
    Wait Until Page Contains    คุณจะไม่สามารถกู้คืนข้อมูลที่ถูกลบไป!
    Wait Until Page Contains    ยกเลิก
    Wait Until Page Contains    ยืนยัน
    # Back to index.blade.php
    Click Element    xpath=//button[@class='swal-button swal-button--cancel']

Verify Research Project Page Thai
    # Switch Language    th
    Click Element    ${RESEARCH_PROJECT_URL}
    # Verify index.blade.php
    Wait Until Page Contains    โครงการวิจัย
    Wait Until Page Contains    เพิ่ม
    Wait Until Page Contains    ลำดับที่
    Wait Until Page Contains    ปี
    Wait Until Page Contains    ชื่อโครงการ
    Wait Until Page Contains    หัวหน้าโครงการ
    Wait Until Page Contains    สมาชิก
    Wait Until Page Contains    ดำเนินการ
    Wait Until Page Contains    ค้นหา:
    Wait Until Page Contains    ย้อนหลัง
    Wait Until Page Contains    ถัดไป  
    # Verify create.blade.php
    Click Element    ${CREATE_RESEARCH_PROJECT_URL}
    Wait Until Page Contains    โครงการวิจัย
    Wait Until Page Contains    กรอกรายละเอียดโครงการวิจัย
    Wait Until Page Contains    ชื่อโครงการ
    Wait Until Page Contains    วันที่เริ่ม
    Wait Until Page Contains    วันที่สิ้นสุด
    Wait Until Page Contains    เลือกทุน
    Wait Until Page Contains    ปีที่ยื่น (ค.ศ.)
    Wait Until Page Contains    งบประมาณ
    Wait Until Page Contains    หน่วยงานที่รับผิดชอบ
    Wait Until Page Contains    รายละเอียดโครงการ
    Wait Until Page Contains    สถานะ
    Wait Until Page Contains    ผู้รับผิดชอบโครงการ
    Wait Until Page Contains    ผู้รับผิดชอบโครงการ (ร่วม) ภายใน
    Wait Until Page Contains    ผู้รับผิดชอบโครงการ (ร่วม) ภายนอก
    Wait Until Page Contains    ยกเลิก
    Wait Until Page Contains    ยืนยัน 
    # Back to index.blade.php
    Click Element    ${RESEARCH_PROJECT_URL}
    # Verify show.blade.php
    Click Element    ${SHOW_RESEARCH_PROJECT_DEMO_URL}
    Wait Until Page Contains    รายละเอียดโครงการ
    Wait Until Page Contains    รายละเอียดของโครงการ
    Wait Until Page Contains    ชื่อโครงการ
    Wait Until Page Contains    วันที่เริ่ม
    Wait Until Page Contains    วันที่สิ้นสุด
    Wait Until Page Contains    ชื่อทุน
    Wait Until Page Contains    งบประมาณ
    Wait Until Page Contains    คำอธิบาย
    Wait Until Page Contains    สถานะ
    Wait Until Page Contains    ผู้รับผิดชอบโครงการ
    Wait Until Page Contains    สมาชิก
    Wait Until Page Contains    กลับ
    # Back to index.blade.php
    Click Element    ${RESEARCH_PROJECT_URL}
    # Verify edit.blade.php
    Click Element    xpath=(//a[@title='Edit'])[1]
    Wait Until Page Contains    แก้ไขโครงการวิจัย
    Wait Until Page Contains    แก้ไขรายละเอียดโครงการ
    Wait Until Page Contains    ชื่อโครงการ
    Wait Until Page Contains    วันที่เริ่ม
    Wait Until Page Contains    วันที่สิ้นสุด
    Wait Until Page Contains    เลือกทุน
    Wait Until Page Contains    ปีที่ยื่น (ค.ศ.)
    Wait Until Page Contains    งบประมาณ 
    Wait Until Page Contains    หน่วยงานที่รับผิดชอบ
    Wait Until Page Contains    รายละเอียดของโครงการ
    Wait Until Page Contains    สถานะ 
    Wait Until Page Contains    ผู้รับผิดชอบโครงการ 
    Wait Until Page Contains    ผู้รับผิดชอบโครงการ (ร่วม) ภายใน 
    Wait Until Page Contains    ผู้รับผิดชอบโครงการ (ร่วม) ภายนอก
    Wait Until Page Contains    ยกเลิก
    Wait Until Page Contains    ยืนยัน 
    # Back to index.blade.php
    Click Element    ${RESEARCH_PROJECT_URL}
    # Verify Delete Message
    Click Element  xpath=//button[@title='Delete']
    Wait Until Page Contains    คุณแน่ใจหรือไม่?
    Wait Until Page Contains    คุณจะไม่สามารถกู้คืนข้อมูลที่ถูกลบไป!
    Wait Until Page Contains    ยกเลิก
    Wait Until Page Contains    ยืนยัน
    # Back to index.blade.php
    Click Element    xpath=//button[@class='swal-button swal-button--cancel']

Verify Research Group Page Thai
    # Switch Language    th
    Click Element    ${RESEARCH_GROUP_URL}
    # Verify index.blade.php
    Wait Until Page Contains    กลุ่มวิจัย
    Wait Until Page Contains    เพิ่ม
    Wait Until Page Contains    ลำดับที่
    Wait Until Page Contains    ชื่อกลุ่มวิจัย
    Wait Until Page Contains    หัวหน้ากลุ่มวิจัย
    Wait Until Page Contains    สมาชิกกลุ่มวิจัย
    Wait Until Page Contains    ดำเนินการ
    Wait Until Page Contains    ค้นหา:
    Wait Until Page Contains    ย้อนหลัง
    Wait Until Page Contains    ถัดไป  
    # Verify create.blade.php
    Click Element    ${CREATE_RESEARCH_GROUP_URL}
    Wait Until Page Contains    สร้างกลุ่มวิจัย
    Wait Until Page Contains    กรอกรายละเอียดกลุ่มวิจัย
    Wait Until Page Contains    ชื่อกลุ่มวิจัย (ไทย)
    Wait Until Page Contains    ชื่อกลุ่มวิจัย (อังกฤษ)
    Wait Until Page Contains    ชื่อกลุ่มวิจัย (ภาษาจีน)
    Wait Until Page Contains    คำอธิบายกลุ่มวิจัย (ไทย)
    Wait Until Page Contains    คำอธิบายกลุ่มวิจัย (อังกฤษ)
    Wait Until Page Contains    คำอธิบายกลุ่มวิจัย (ภาษาจีน)
    Wait Until Page Contains    รายละเอียดกลุ่มวิจัย (ไทย)
    Wait Until Page Contains    รายละเอียดกลุ่มวิจัย (อังกฤษ)
    Wait Until Page Contains    รายละเอียดกลุ่มวิจัย (ภาษาจีน)
    Wait Until Page Contains    รูปภาพกลุ่มวิจัย
    Wait Until Page Contains    หัวหน้ากลุ่มวิจัย
    Wait Until Page Contains    สมาชิกกลุ่มวิจัย
    Wait Until Page Contains    ยืนยัน 
    Wait Until Page Contains    กลับ
    # Back to index.blade.php
    Click Element    ${RESEARCH_GROUP_URL}
    # Verify show.blade.php
    Click Element    ${SHOW_RESEARCH_GROUP_DEMO_URL}
    Wait Until Page Contains    รายละเอียดกลุ่มวิจัย
    Wait Until Page Contains    รายละเอียดของกลุ่มวิจัย  
    Wait Until Page Contains    ชื่อกลุ่มวิจัย (ไทย)
    Wait Until Page Contains    ชื่อกลุ่มวิจัย (อังกฤษ)
    Wait Until Page Contains    ชื่อกลุ่มวิจัย (ภาษาจีน)
    Wait Until Page Contains    คำอธิบายกลุ่มวิจัย (ไทย)
    Wait Until Page Contains    คำอธิบายกลุ่มวิจัย (อังกฤษ)
    Wait Until Page Contains    คำอธิบายกลุ่มวิจัย (ภาษาจีน)
    Wait Until Page Contains    รายละเอียดกลุ่มวิจัย (ไทย)
    Wait Until Page Contains    รายละเอียดกลุ่มวิจัย (อังกฤษ)
    Wait Until Page Contains    รายละเอียดกลุ่มวิจัย (ภาษาจีน)  
    Wait Until Page Contains    หัวหน้ากลุ่มวิจัย
    Wait Until Page Contains    สมาชิกกลุ่มวิจัย   
    Wait Until Page Contains    กลับ
    # Back to index.blade.php
    Click Element    ${RESEARCH_GROUP_URL}
    # Verify Edit.blade.php
    Click Element    xpath=(//a[@title='Edit'])[1]
    Wait Until Page Contains    แก้ไขกลุ่มวิจัย
    Wait Until Page Contains    แก้ไขรายละเอียดกลุ่มวิจัย
    Wait Until Page Contains    ชื่อกลุ่มวิจัย (ไทย)
    Wait Until Page Contains    ชื่อกลุ่มวิจัย (อังกฤษ)
    Wait Until Page Contains    ชื่อกลุ่มวิจัย (ภาษาจีน)
    Wait Until Page Contains    คำอธิบายกลุ่มวิจัย (ไทย)
    Wait Until Page Contains    คำอธิบายกลุ่มวิจัย (อังกฤษ)
    Wait Until Page Contains    คำอธิบายกลุ่มวิจัย (ภาษาจีน)
    Wait Until Page Contains    รายละเอียดกลุ่มวิจัย (ไทย)
    Wait Until Page Contains    รายละเอียดกลุ่มวิจัย (อังกฤษ)
    Wait Until Page Contains    รายละเอียดกลุ่มวิจัย (ภาษาจีน)  
    Wait Until Page Contains    รูปภาพกลุ่มวิจัย
    Wait Until Page Contains    หัวหน้ากลุ่มวิจัย
    Wait Until Page Contains    สมาชิกกลุ่มวิจัย
    Wait Until Page Contains    ยืนยัน 
    Wait Until Page Contains    ยกเลิก
    # Back to index.blade.php
    Click Element    ${RESEARCH_GROUP_URL}  

Verify Published Research Page Thai  
    # Switch Language    th
    Click Element    xpath=//a[@href='#ManagePublications']
    Click Element    ${PUBLISHED_RESEARCH_URL}
    # Verify index.blade.php
    Wait Until Page Contains    ผลงานวิจัยที่ตีพิมพ์
    Wait Until Page Contains    เพิ่ม
    Wait Until Page Contains    ลำดับที่
    Wait Until Page Contains    ชื่อผลงาน
    Wait Until Page Contains    ประเภท
    Wait Until Page Contains    ปีที่ตีพิมพ์
    Wait Until Page Contains    วันที่ดึงข้อมูลจาก API
    Wait Until Page Contains    ดำเนินการ
    Wait Until Page Contains    ค้นหา:
    Wait Until Page Contains    ย้อนหลัง
    Wait Until Page Contains    ถัดไป
    # Verify create.blade.php
    Click Element    ${CREATE_PUBLISHED_RESEARCH_URL}
    Wait Until Page Contains    สร้างผลงานวิจัยที่ตีพิมพ์
    Wait Until Page Contains    กรอกรายละเอียดผลงานวิจัยที่ตีพิมพ์
    Wait Until Page Contains    แหล่งเผยแพร่งานวิจัย
    Wait Until Page Contains    ชื่อผลงาน
    Wait Until Page Contains    บทคัดย่อ
    Wait Until Page Contains    คำสำคัญ
    Wait Until Page Contains    ประเภทวารสาร
    Wait Until Page Contains    ประเภทเอกสาร
    Wait Until Page Contains    การตีพิมพ์
    Wait Until Page Contains    ชื่อวารสาร
    Wait Until Page Contains    ปีที่ตีพิมพ์
    Wait Until Page Contains    เล่ม
    Wait Until Page Contains    ฉบับ
    Wait Until Page Contains    จำนวนการอ้างอิง
    Wait Until Page Contains    หน้า
    Wait Until Page Contains    DOI
    Wait Until Page Contains    ผู้สนับสนุนทุน
    Wait Until Page Contains    URL
    Wait Until Page Contains    ชื่อผู้แต่ง (ในสาขา)
    Wait Until Page Contains    ชื่อผู้แต่ง (นอกสาขา)
    Wait Until Page Contains    ยกเลิก
    Wait Until Page Contains    ยืนยัน
    # Back to index.blade.php
    Click Element    xpath=//a[@href='#ManagePublications']
    Click Element    ${PUBLISHED_RESEARCH_URL}
    # Verify show.blade.php
    Click Element    ${SHOW_PUBLISHED_RESEARCH_DEMO_URL}
    Wait Until Page Contains    รายละเอียดผลงานวิจัยที่ตีพิมพ์
    Wait Until Page Contains    รายละเอียดของผลงาน
    Wait Until Page Contains    ชื่อผลงาน
    Wait Until Page Contains    บทคัดย่อ
    Wait Until Page Contains    คำสำคัญ
    Wait Until Page Contains    ประเภทวารสาร
    Wait Until Page Contains    ประเภทเอกสาร
    Wait Until Page Contains    การตีพิมพ์
    Wait Until Page Contains    ผู้แต่ง
    Wait Until Page Contains    ผู้แต่งคนแรก:
    Wait Until Page Contains    ผู้แต่งที่สามารถติดต่อได้:
    Wait Until Page Contains    ชื่อวารสาร
    Wait Until Page Contains    ปีที่ตีพิมพ์
    Wait Until Page Contains    เล่ม
    Wait Until Page Contains    ฉบับ  
    Wait Until Page Contains    หน้า
    Wait Until Page Contains    DOI    
    Wait Until Page Contains    URL
    Wait Until Page Contains    กลับ
    # Back to index.blade.php
    # Click Element    xpath=//a[@href='#ManagePublications']
    Click Element    ${PUBLISHED_RESEARCH_URL}    

Verify Book Page Thai
    # Switch Language    th
    # Click Element    xpath=//a[@href='#ManagePublications']
    Click Element    ${BOOK_URL}
    # Verify index.blade.php
    Wait Until Page Contains    หนังสือ
    Wait Until Page Contains    เพิ่ม
    Wait Until Page Contains    ลำดับที่
    Wait Until Page Contains    ชื่อหนังสือ
    Wait Until Page Contains    ปีที่ตีพิมพ์ (พ.ศ.)
    Wait Until Page Contains    แหล่งเผยแพร่หนังสือ(ภาษาไทย)
    Wait Until Page Contains    หน้า
    Wait Until Page Contains    ดำเนินการ
    Wait Until Page Contains    ค้นหา:
    Wait Until Page Contains    ย้อนหลัง
    Wait Until Page Contains    ถัดไป 
    # Verify create.blade.php
    Click Element    ${CREATE_BOOK_URL}
    Wait Until Page Contains    สร้างหนังสือ
    Wait Until Page Contains    กรอกรายละเอียดหนังสือ
    Wait Until Page Contains    ชื่อหนังสือ
    Wait Until Page Contains    แหล่งเผยแพร่หนังสือ(ภาษาไทย)
    Wait Until Page Contains    แหล่งเผยแพร่หนังสือ(อังกฤษ)
    Wait Until Page Contains    แหล่งเผยแพร่หนังสือ(จีน)
    Wait Until Page Contains    ปีที่ตีพิมพ์ (พ.ศ.)
    Wait Until Page Contains    หน้า
    Wait Until Page Contains    ยกเลิก
    Wait Until Page Contains    ยืนยัน
    # Back to index.blade.php
    Click Element    xpath=//a[@href='#ManagePublications']
    Click Element    ${BOOK_URL}
    # Verify show.blade.php
    Click Element    ${SHOW_BOOK_DEMO_URL}
    Wait Until Page Contains    รายละเอียดหนังสือ
    Wait Until Page Contains    รายละเอียดของหนังสือ
    Wait Until Page Contains    ชื่อหนังสือ
    Wait Until Page Contains    ปีที่ตีพิมพ์ (พ.ศ.)
    Wait Until Page Contains    แหล่งเผยแพร่หนังสือ(ภาษาไทย)
    Wait Until Page Contains    หน้า
    Wait Until Page Contains    กลับ
    # Back to index.blade.php
    Click Element    xpath=//a[@href='#ManagePublications']
    Click Element    ${BOOK_URL}    

Verify Other Academic Works Page Thai
    # Switch Language    th
    # Click Element    xpath=//a[@href='#ManagePublications']
    Click Element    ${OTHER_ACADEMIC_WORK_URL}
    # Verify index.blade.php
    Wait Until Page Contains    ผลงานวิชาการอื่นๆ (สิทธิบัตร, อนุสิทธิบัตร,ลิขสิทธิ์)
    Wait Until Page Contains    เพิ่ม
    Wait Until Page Contains    ลำดับที่
    Wait Until Page Contains    ชื่อผลงาน
    Wait Until Page Contains    ประเภท
    Wait Until Page Contains    วันที่จดทะเบียน
    Wait Until Page Contains    หมายเลขจดทะเบียน
    Wait Until Page Contains    จัดทำโดย
    Wait Until Page Contains    ดำเนินการ
    Wait Until Page Contains    ค้นหา:
    Wait Until Page Contains    ย้อนหลัง
    Wait Until Page Contains    ถัดไป 
    # Verify create.blade.php
    Click Element    ${CREATE_OTHER_ACADEMIC_WORK_URL}
    Wait Until Page Contains    สร้างผลงานวิชาการอื่นๆ
    Wait Until Page Contains    กรอกรายละเอียดผลงานวิชาการอื่นๆ (สิทธิบัตร, อนุสิทธิบัตร,ลิขสิทธิ์)
    Wait Until Page Contains    ชื่อผลงาน (สิทธิบัตร, อนุสิทธิบัตร,ลิขสิทธิ์)
    Wait Until Page Contains    ประเภท
    Wait Until Page Contains    วันที่จดทะเบียนลิขสิทธิ์
    Wait Until Page Contains    หมายเลขจดทะเบียน
    Wait Until Page Contains    อาจารย์ในสาขา
    Wait Until Page Contains    ผู้จัดทำร่วม (นอกสาขา)
    Wait Until Page Contains    ชื่อ
    Wait Until Page Contains    นามสกุล
    Wait Until Page Contains    ยกเลิก
    Wait Until Page Contains    ยืนยัน
    # Back to index.blade.php
    Click Element    xpath=//a[@href='#ManagePublications']
    Click Element    ${OTHER_ACADEMIC_WORK_URL}
    # Verify show.blade.php
    Click Element    ${SHOW_OTHER_ACADEMIC_WORK_DEMO_URL}
    Wait Until Page Contains    รายละเอียดผลงานวิชาการอื่นๆ (สิทธิบัตร, อนุสิทธิบัตร,ลิขสิทธิ์)
    Wait Until Page Contains    รายละเอียดของผลงาน (สิทธิบัตร, อนุสิทธิบัตร,ลิขสิทธิ์)
    Wait Until Page Contains    ชื่อผลงาน
    Wait Until Page Contains    ประเภท
    Wait Until Page Contains    วันที่จดทะเบียน
    Wait Until Page Contains    หมายเลขจดทะเบียน
    Wait Until Page Contains    หมายเลข
    Wait Until Page Contains    จัดทำโดย
    Wait Until Page Contains    ผู้จัดทำร่วม
    Wait Until Page Contains    กลับ
    # Back to index.blade.php
    Click Element    xpath=//a[@href='#ManagePublications']
    Click Element    ${OTHER_ACADEMIC_WORK_URL}   

Verify Department Page Thai
    # Switch Language    th
    Click Element    ${DEPARTMENT_URL}
    # Verify index.blade.php
    Wait Until Page Contains    สาขาวิชา
    Wait Until Page Contains    ชื่อสาขาวิชา
    Wait Until Page Contains    ดำเนินการ
    # Verify create.blade.php
    Click Element    ${CREATE_DEPARTMENT_URL}
    Wait Until Page Contains    สร้างสาขาวิชา
    Wait Until Page Contains    ชื่อสาขาวิชา (ไทย)   
    Wait Until Page Contains    ชื่อสาขาวิชา (อังกฤษ)
    Wait Until Page Contains    ยืนยัน  
    Wait Until Page Contains    กลับ 
    # Back to index.blade.php
    Click Element    ${DEPARTMENT_URL}    
    # Verify show.blade.php
    Click Element    ${SHOW_DEPARTMENT_DEMO_URL}
    Wait Until Page Contains    ชื่อสาขาวิชา (ไทย)
    Wait Until Page Contains    ชื่อสาขาวิชา (อังกฤษ)
    # Wait Until Page Contains    กลับ
    # Back to index.blade.php    
    Click Element    ${DEPARTMENT_URL}
    # Verify Edit.blade.php
    Click Element    xpath=(//a[@title='Edit'])[1]
    Wait Until Page Contains    แก้ไขสาขาวิชา  
    Wait Until Page Contains    ชื่อสาขาวิชา (ไทย)
    Wait Until Page Contains    ชื่อสาขาวิชา (อังกฤษ)
    Wait Until Page Contains    ยืนยัน
    Wait Until Page Contains    กลับ
    # Back to index.blade.php
    Click Element    ${DEPARTMENT_URL}
    # Verify Delete Message
    Click Element    xpath=(//button[@title='Delete'])[1]
    Wait Until Page Contains    คุณแน่ใจหรือไม่?
    Wait Until Page Contains    คุณจะไม่สามารถกู้คืนข้อมูลที่ถูกลบไป!
    Wait Until Page Contains    ยกเลิก
    Wait Until Page Contains    ยืนยัน
    # Back to index.blade.php
    Click Element    xpath=//button[@class='swal-button swal-button--cancel']

Verify Manage Program Page Thai
    # Switch Language    th
    # Scroll Element Into View    ${MANAGE_PROGRAM_URL}
    Click Element    ${MANAGE_PROGRAM_URL}
    # Verify index.blade.php
    Wait Until Page Contains    จัดการหลักสูตร
    Wait Until Page Contains    ลำดับที่
    Wait Until Page Contains    ชื่อหลักสูตร
    Wait Until Page Contains    ระดับการศึกษา
    Wait Until Page Contains    ดำเนินการ
    Wait Until Page Contains    ค้นหา:
    Wait Until Page Contains    ย้อนหลัง
    Wait Until Page Contains    ถัดไป  
    # Verify create.blade.php
    # Scroll Element Into View    id=new-program
    Click Element    id=new-program
    Wait Until Page Contains    เพิ่มหลักสูตรใหม่
    Wait Until Page Contains    ระดับการศึกษา 
    Wait Until Page Contains    ชื่อสาขาวิชา
    Wait Until Page Contains    ชื่อหลักสูตร (ไทย)
    Wait Until Page Contains    ชื่อหลักสูตร (อังกฤษ)
    Wait Until Page Contains    ชื่อหลักสูตร (จีน)
    Wait Until Page Contains    ยืนยัน  
    Wait Until Page Contains    ยกเลิก 
    # Back to index.blade.php
    Click Element    xpath=(//a[contains(@href, '/programs')])[2]
    # Verify Edit.blade.php
    Click Element    xpath=(//a[@title='Edit'])[1]
    Wait Until Page Contains    แก้ไขหลักสูตร
    Wait Until Page Contains    ระดับการศึกษา
    Wait Until Page Contains    ชื่อสาขาวิชา
    Wait Until Page Contains    ชื่อหลักสูตร (ไทย)
    Wait Until Page Contains    ชื่อหลักสูตร (อังกฤษ)
    Wait Until Page Contains    ชื่อหลักสูตร (จีน)
    Wait Until Page Contains    ยืนยัน
    Wait Until Page Contains    ยกเลิก 
    # Back to index.blade.php
    Click Element    xpath=(//a[contains(@href, '/programs')])[2]
    # Verify Delete Message
    Click Element    xpath=(//button[@title='Delete'])[1]
    Wait Until Page Contains    คุณแน่ใจหรือไม่?
    Wait Until Page Contains    คุณจะไม่สามารถกู้คืนข้อมูลที่ถูกลบไป!
    Wait Until Page Contains    ยกเลิก
    Wait Until Page Contains    ยืนยัน
    # Back to index.blade.php
    Click Element    xpath=//button[@class='swal-button swal-button--cancel']

# =================== Chinese Language Keywords ===================
Verify Dashboard Page Chinese
    Click Element    ${DASHBOARD_PATH}
    Switch Language    cn
    Wait Until Page Contains    研究信息管理系统
    Wait Until Page Contains    欢迎来到研究信息管理系统
    Wait Until Page Contains    你好      
    Wait Until Page Contains    登出

Verify Profile Page Chinese
    # Switch Language    cn
    Click Element    ${PROFILE_URL}
    Wait Until Page Contains    更改图片
    # Verify All Tab Title
    Wait Until Page Contains    帐户
    Wait Until Page Contains    密码
    Wait Until Page Contains    专长
    Wait Until Page Contains    教育
    # Verify Account Tab
    Click Element    ${ACCOUNT_TAB}
    Wait Until Page Contains    設定檔設定
    Wait Until Page Contains    代词
    Wait Until Page Contains    名字（英文）
    Wait Until Page Contains    姓氏（英文）
    Wait Until Page Contains    名字（泰文）
    Wait Until Page Contains    姓氏（泰文）
    Wait Until Page Contains    名字（中文）
    Wait Until Page Contains    姓氏（中文）
    Wait Until Page Contains    电子邮件
    Wait Until Page Contains    更新
    # Verify Password Tab
    Click Element    ${PASSWORD_TAB}
    Wait Until Page Contains    密码设置
    Wait Until Page Contains    旧密码
    Wait Until Page Contains    新密码
    Wait Until Page Contains    确认新密码
    Wait Until Page Contains    更新    

Verify Manage Fund Page Chinese
    # Switch Language    cn
    Click Element    ${MANAGE_FUND_URL}
    # Verify index.blade.php
    Wait Until Page Contains    研究基金
    Wait Until Page Contains    添加
    Wait Until Page Contains    编号
    Wait Until Page Contains    基金名称
    Wait Until Page Contains    基金类型
    Wait Until Page Contains    基金级别
    Wait Until Page Contains    搜索:
    Wait Until Page Contains    上一页
    Wait Until Page Contains    下一页    
    # Verify create.blade.php
    Click Element    ${CREATE_MANAGE_FUND_URL}
    Wait Until Page Contains    添加研究基金
    Wait Until Page Contains    输入研究基金详情
    Wait Until Page Contains    基金类型
    Wait Until Page Contains    基金级别
    Wait Until Page Contains    基金名称
    Wait Until Page Contains    支持组织/研究项目 (中国人)
    Wait Until Page Contains    支持机构 / 研究项目 (英语)
    Wait Until Page Contains    支持机构 / 研究项目 (中国)
    Wait Until Page Contains    提交
    Wait Until Page Contains    取消
    # Back to index.blade.php
    Click Element    ${MANAGE_FUND_URL}
    # Verify show.blade.php
    Click Element    ${SHOW_FUND_DEMO_URL}
    Wait Until Page Contains    基金详情
    Wait Until Page Contains    基金描述
    Wait Until Page Contains    基金名称
    Wait Until Page Contains    年份
    Wait Until Page Contains    基金详情
    Wait Until Page Contains    基金类型
    Wait Until Page Contains    基金级别
    Wait Until Page Contains    组织
    Wait Until Page Contains    添加详细基金
    Wait Until Page Contains    返回
    # Back to index.blade.php
    Click Element    ${MANAGE_FUND_URL}
    # Verify Edit.blade.php
    Click Element    xpath=(//a[@title='Edit'])[1]
    Wait Until Page Contains    编辑基金
    Wait Until Page Contains    编辑研究基金详情
    Wait Until Page Contains    基金类型
    Wait Until Page Contains    基金级别
    Wait Until Page Contains    基金名称
    Wait Until Page Contains    支持组织/研究项目 (中国人)
    Wait Until Page Contains    支持机构 / 研究项目 (英语)   
    Wait Until Page Contains    支持机构 / 研究项目 (中国)
    Wait Until Page Contains    提交
    Wait Until Page Contains    取消
    # Back to index.blade.php
    Click Element    ${MANAGE_FUND_URL}
    # Verify Delete Message
    Click Element  xpath=//button[@title='Delete']
    Wait Until Page Contains    您确定要删除此基金吗？
    Wait Until Page Contains    您将无法恢复已删除的数据！
    Wait Until Page Contains    取消
    Wait Until Page Contains    提交
    # Back to index.blade.php
    Click Element    xpath=//button[@class='swal-button swal-button--cancel']

Verify Research Project Page Chinese
    # Switch Language    cn
    Click Element    ${RESEARCH_PROJECT_URL}
    # Verify index.blade.php
    Wait Until Page Contains    研究项目
    Wait Until Page Contains    添加
    Wait Until Page Contains    编号
    Wait Until Page Contains    年份
    Wait Until Page Contains    项目名称
    Wait Until Page Contains    负责人
    Wait Until Page Contains    成员
    Wait Until Page Contains    操作
    Wait Until Page Contains    搜索:
    Wait Until Page Contains    上一页
    Wait Until Page Contains    下一页  
    # Verify create.blade.php
    Click Element    ${CREATE_RESEARCH_PROJECT_URL}
    Wait Until Page Contains    研究项目
    Wait Until Page Contains    输入研究项目详情
    Wait Until Page Contains    项目名称
    Wait Until Page Contains    开始日期
    Wait Until Page Contains    结束日期
    Wait Until Page Contains    选择基金
    Wait Until Page Contains    提交年份（公元）
    Wait Until Page Contains    预算
    Wait Until Page Contains    负责部门
    Wait Until Page Contains    项目详情
    Wait Until Page Contains    状态
    Wait Until Page Contains    项目负责人
    Wait Until Page Contains    项目负责人（合作）内部
    Wait Until Page Contains    项目负责人（合作）外部
    Wait Until Page Contains    提交
    Wait Until Page Contains    取消 
    # Back to index.blade.php
    Click Element    ${RESEARCH_PROJECT_URL}
    # Verify show.blade.php
    Click Element    ${SHOW_RESEARCH_PROJECT_DEMO_URL}
    Wait Until Page Contains    项目详情
    Wait Until Page Contains    项目描述
    Wait Until Page Contains    项目名称
    Wait Until Page Contains    开始日期
    Wait Until Page Contains    结束日期
    Wait Until Page Contains    基金名称
    Wait Until Page Contains    预算
    Wait Until Page Contains    备注
    Wait Until Page Contains    状态
    Wait Until Page Contains    项目负责人
    Wait Until Page Contains    成员
    Wait Until Page Contains    返回
    # Back to index.blade.php
    Click Element    ${RESEARCH_PROJECT_URL}
    # Verify edit.blade.php
    Click Element    xpath=(//a[@title='Edit'])[1]
    Wait Until Page Contains    编辑研究项目
    Wait Until Page Contains    编辑研究项目详情
    Wait Until Page Contains    项目名称
    Wait Until Page Contains    开始日期
    Wait Until Page Contains    结束日期
    Wait Until Page Contains    选择基金
    Wait Until Page Contains    提交年份（公元）
    Wait Until Page Contains    预算
    Wait Until Page Contains    负责部门
    Wait Until Page Contains    项目描述
    Wait Until Page Contains    状态 
    Wait Until Page Contains    项目负责人
    Wait Until Page Contains    项目负责人（合作）内部
    Wait Until Page Contains    项目负责人（合作）外部
    Wait Until Page Contains    取消
    Wait Until Page Contains    提交 
    # Back to index.blade.php
    Click Element    ${RESEARCH_PROJECT_URL}
    # Verify Delete Message
    Click Element  xpath=//button[@title='Delete']
    Wait Until Page Contains    您确定要删除此基金吗？
    Wait Until Page Contains    您将无法恢复已删除的数据！
    Wait Until Page Contains    取消
    Wait Until Page Contains    提交
    # Back to index.blade.php
    Click Element    xpath=//button[@class='swal-button swal-button--cancel']

Verify Research Group Page Chinese
    # Switch Language    cn
    Click Element    ${RESEARCH_GROUP_URL}
    # Verify index.blade.php
    Wait Until Page Contains    研究小组
    Wait Until Page Contains    添加
    Wait Until Page Contains    编号
    Wait Until Page Contains    小组名称
    Wait Until Page Contains    负责人
    Wait Until Page Contains    成员
    Wait Until Page Contains    操作
    Wait Until Page Contains    搜索:
    Wait Until Page Contains    上一页
    Wait Until Page Contains    下一页  
    # Verify create.blade.php
    Click Element    ${CREATE_RESEARCH_GROUP_URL}
    Wait Until Page Contains    创建研究小组
    Wait Until Page Contains    输入研究小组详情
    Wait Until Page Contains    小组名称（泰文）
    Wait Until Page Contains    小组名称（英文）
    Wait Until Page Contains    小组名称（中国人）
    Wait Until Page Contains    小组描述（泰文）
    Wait Until Page Contains    小组描述（英文）
    Wait Until Page Contains    研究小组简介
    Wait Until Page Contains    小组详情（泰文）
    Wait Until Page Contains    小组详情（英文）
    Wait Until Page Contains    研究小组详情
    Wait Until Page Contains    研究小组图片
    Wait Until Page Contains    负责人
    Wait Until Page Contains    成员
    Wait Until Page Contains    提交 
    Wait Until Page Contains    返回
    # Back to index.blade.php
    Click Element    ${RESEARCH_GROUP_URL}
    # Verify show.blade.php
    Click Element    ${SHOW_RESEARCH_GROUP_DEMO_URL}
    Wait Until Page Contains    小组详情
    Wait Until Page Contains    小组描述
    Wait Until Page Contains    小组名称（泰文）
    Wait Until Page Contains    小组名称（英文）
    Wait Until Page Contains    小组名称（中国人）
    Wait Until Page Contains    小组描述（泰文）
    Wait Until Page Contains    小组描述（英文）
    Wait Until Page Contains    研究小组简介
    Wait Until Page Contains    小组详情（泰文）
    Wait Until Page Contains    小组详情（英文）
    Wait Until Page Contains    研究小组详情
    Wait Until Page Contains    负责人
    Wait Until Page Contains    成员   
    Wait Until Page Contains    返回
    # Back to index.blade.php
    Click Element    ${RESEARCH_GROUP_URL}
    # Verify Edit.blade.php
    Click Element    xpath=(//a[@title='Edit'])[1]
    Wait Until Page Contains    编辑研究小组
    Wait Until Page Contains    编辑研究小组详情
    Wait Until Page Contains    小组名称（英文）
    Wait Until Page Contains    小组名称（中国人）
    Wait Until Page Contains    小组描述（泰文）
    Wait Until Page Contains    小组描述（泰文）
    Wait Until Page Contains    小组描述（英文）
    Wait Until Page Contains    研究小组简介
    Wait Until Page Contains    小组详情（泰文）
    Wait Until Page Contains    小组详情（英文）
    Wait Until Page Contains    研究小组详情 
    Wait Until Page Contains    研究小组图片
    Wait Until Page Contains    负责人
    Wait Until Page Contains    成员
    Wait Until Page Contains    提交 
    Wait Until Page Contains    取消
    # Back to index.blade.php
    Click Element    ${RESEARCH_GROUP_URL}    

Verify Published Research Page Chinese  
    # Switch Language    cn
    Click Element    xpath=//a[@href='#ManagePublications']
    Click Element    ${PUBLISHED_RESEARCH_URL}
    # Verify index.blade.php
    Wait Until Page Contains    已发表的研究
    Wait Until Page Contains    添加
    Wait Until Page Contains    编号
    Wait Until Page Contains    标题
    Wait Until Page Contains    类型
    Wait Until Page Contains    发表年份
    Wait Until Page Contains    API提取日期
    Wait Until Page Contains    操作
    Wait Until Page Contains    搜索:
    Wait Until Page Contains    上一页
    Wait Until Page Contains    下一页  
    # Verify create.blade.php
    Click Element    ${CREATE_PUBLISHED_RESEARCH_URL}
    Wait Until Page Contains    创建已发表研究
    Wait Until Page Contains    输入已发表研究详情
    Wait Until Page Contains    来源
    Wait Until Page Contains    标题
    Wait Until Page Contains    摘要
    Wait Until Page Contains    关键词
    Wait Until Page Contains    期刊类型
    Wait Until Page Contains    文档类型
    Wait Until Page Contains    出版物
    Wait Until Page Contains    期刊名称
    Wait Until Page Contains    发表年份
    Wait Until Page Contains    卷
    Wait Until Page Contains    问题
    Wait Until Page Contains    引用次数
    Wait Until Page Contains    页
    Wait Until Page Contains    DOI（数字对象标识符）
    Wait Until Page Contains    资助方
    Wait Until Page Contains    URL（统一资源定位符）
    Wait Until Page Contains    作者（内部）
    Wait Until Page Contains    作者（外部）
    Wait Until Page Contains    提交
    Wait Until Page Contains    取消
    # Back to index.blade.php
    Click Element    xpath=//a[@href='#ManagePublications']
    Click Element    ${PUBLISHED_RESEARCH_URL}
    # Verify show.blade.php
    Click Element    ${SHOW_PUBLISHED_RESEARCH_DEMO_URL}
    Wait Until Page Contains    已发表研究详情
    Wait Until Page Contains    研究描述
    Wait Until Page Contains    标题
    Wait Until Page Contains    摘要
    Wait Until Page Contains    关键词
    Wait Until Page Contains    期刊类型
    Wait Until Page Contains    文档类型
    Wait Until Page Contains    出版物
    Wait Until Page Contains    作者
    Wait Until Page Contains    第一作者:
    Wait Until Page Contains    通讯作者:
    Wait Until Page Contains    期刊名称
    Wait Until Page Contains    发表年份
    Wait Until Page Contains    卷
    Wait Until Page Contains    问题  
    Wait Until Page Contains    页
    Wait Until Page Contains    DOI（数字对象标识符）    
    Wait Until Page Contains    URL（统一资源定位符）
    Wait Until Page Contains    返回
    # Back to index.blade.php
    # Click Element    xpath=//a[@href='#ManagePublications']
    Click Element    ${PUBLISHED_RESEARCH_URL}   

Verify Book Page Chinese  
    # Switch Language    cn
    # Click Element    xpath=//a[@href='#ManagePublications']
    Click Element    ${BOOK_URL}
    # Verify index.blade.php
    Wait Until Page Contains    书籍
    Wait Until Page Contains    添加
    Wait Until Page Contains    编号
    Wait Until Page Contains    标题
    Wait Until Page Contains    出版年份
    Wait Until Page Contains    来源(泰国)
    Wait Until Page Contains    页数
    Wait Until Page Contains    操作
    Wait Until Page Contains    搜索:
    Wait Until Page Contains    上一页
    Wait Until Page Contains    下一页  
    # Verify create.blade.php
    Click Element    ${CREATE_BOOK_URL}
    Wait Until Page Contains    创建书籍
    Wait Until Page Contains    输入书籍详情
    Wait Until Page Contains    标题
    Wait Until Page Contains    来源(泰国)
    Wait Until Page Contains    来源(中国人)
    Wait Until Page Contains    来源(英语)
    Wait Until Page Contains    出版年份
    Wait Until Page Contains    页数
    Wait Until Page Contains    提交
    Wait Until Page Contains    取消
    # Back to index.blade.php
    Click Element    xpath=//a[@href='#ManagePublications']
    Click Element    ${BOOK_URL}
    # Verify show.blade.php
    Click Element    ${SHOW_BOOK_DEMO_URL}
    Wait Until Page Contains    书籍详情
    Wait Until Page Contains    书籍描述
    Wait Until Page Contains    标题
    Wait Until Page Contains    出版年份
    Wait Until Page Contains    来源(泰国)
    Wait Until Page Contains    页数
    Wait Until Page Contains    返回
    # Back to index.blade.php
    Click Element    xpath=//a[@href='#ManagePublications']
    Click Element    ${BOOK_URL}
    
Verify Other Academic Works Page Chinese  
    # Switch Language    cn
    # Click Element    xpath=//a[@href='#ManagePublications']
    Click Element    ${OTHER_ACADEMIC_WORK_URL}
    # Verify index.blade.php
    Wait Until Page Contains    其他学术作品
    Wait Until Page Contains    添加
    Wait Until Page Contains    编号
    Wait Until Page Contains    标题
    Wait Until Page Contains    类型
    Wait Until Page Contains    注册日期
    Wait Until Page Contains    注册编号
    Wait Until Page Contains    作者
    Wait Until Page Contains    操作
    Wait Until Page Contains    搜索:
    Wait Until Page Contains    上一页
    Wait Until Page Contains    下一页  
    # Verify create.blade.php
    Click Element    ${CREATE_OTHER_ACADEMIC_WORK_URL}
    Wait Until Page Contains    创建其他学术作品
    Wait Until Page Contains    输入其他学术作品详情 (专利、实用新型、版权)
    Wait Until Page Contains    其他学术作品 (专利、实用新型、版权)
    Wait Until Page Contains    类型
    Wait Until Page Contains    版权日期
    Wait Until Page Contains    注册编号
    Wait Until Page Contains    领域内的教师
    Wait Until Page Contains    外部人员 (合作)
    Wait Until Page Contains    名字
    Wait Until Page Contains    姓氏
    Wait Until Page Contains    提交
    Wait Until Page Contains    取消
    # Back to index.blade.php
    Click Element    xpath=//a[@href='#ManagePublications']
    Click Element    ${OTHER_ACADEMIC_WORK_URL}
    # Verify show.blade.php
    Click Element    ${SHOW_OTHER_ACADEMIC_WORK_DEMO_URL}
    Wait Until Page Contains    其他学术成果详情（专利、实用新型、版权）
    Wait Until Page Contains    成果描述（专利、实用新型、版权）
    Wait Until Page Contains    标题
    Wait Until Page Contains    类型
    Wait Until Page Contains    注册日期
    Wait Until Page Contains    注册编号
    Wait Until Page Contains    编号
    Wait Until Page Contains    作者
    Wait Until Page Contains    共同作者
    Wait Until Page Contains    返回
    # Back to index.blade.php
    Click Element    xpath=//a[@href='#ManagePublications']
    Click Element    ${OTHER_ACADEMIC_WORK_URL}    

Verify Department Page Chinese
    # Switch Language    cn
    Click Element    ${DEPARTMENT_URL}
    # Verify index.blade.php
    Wait Until Page Contains    部门
    Wait Until Page Contains    部门名称
    Wait Until Page Contains    操作
    # Verify create.blade.php
    Click Element    ${CREATE_DEPARTMENT_URL}
    Wait Until Page Contains    创建部门
    Wait Until Page Contains    部门名称 (泰文)   
    Wait Until Page Contains    部门名称 (英文)
    Wait Until Page Contains    提交  
    Wait Until Page Contains    返回
    # Back to index.blade.php
    Click Element    ${DEPARTMENT_URL}    
    # Verify show.blade.php
    Click Element    ${SHOW_DEPARTMENT_DEMO_URL}
    Wait Until Page Contains    部门名称 (泰文)
    Wait Until Page Contains    部门名称 (英文)
    # Wait Until Page Contains    返回
    # Back to index.blade.php    
    Click Element    ${DEPARTMENT_URL}
    # Verify Edit.blade.php
    Click Element    xpath=(//a[@title='Edit'])[1]
    Wait Until Page Contains    编辑部门
    Wait Until Page Contains    部门名称 (泰文)
    Wait Until Page Contains    部门名称 (英文)
    Wait Until Page Contains    提交
    Wait Until Page Contains    返回
    # Back to index.blade.php
    Click Element    ${DEPARTMENT_URL}
    # Verify Delete Message
    Click Element    xpath=(//button[@title='Delete'])[1]
    Wait Until Page Contains    您确定要删除此基金吗？
    Wait Until Page Contains    您将无法恢复已删除的数据！
    Wait Until Page Contains    取消
    Wait Until Page Contains    提交
    # Back to index.blade.php
    Click Element    xpath=//button[@class='swal-button swal-button--cancel']

Verify Manage Program Page Chinese
    # Switch Language    cn
    # Scroll Element Into View    ${MANAGE_PROGRAM_URL}
    Click Element    ${MANAGE_PROGRAM_URL}
    # Verify index.blade.php
    Wait Until Page Contains    管理项目
    Wait Until Page Contains    编号
    Wait Until Page Contains    项目名称
    Wait Until Page Contains    学位
    Wait Until Page Contains    操作
    Wait Until Page Contains    搜索:
    Wait Until Page Contains    上一页
    Wait Until Page Contains    下一页 
    # Verify create.blade.php
    # Scroll Element Into View    id=new-program
    Click Element    id=new-program
    Wait Until Page Contains    添加新项目
    Wait Until Page Contains    学位 
    Wait Until Page Contains    部门名称
    Wait Until Page Contains    项目名称 (泰文)
    Wait Until Page Contains    项目名称 (英文)
    Wait Until Page Contains    项目名称 (中文)
    Wait Until Page Contains    提交  
    Wait Until Page Contains    取消 
    # Back to index.blade.php
    Click Element    xpath=(//a[contains(@href, '/programs')])[2]
    # Verify Edit.blade.php
    Click Element    xpath=(//a[@title='Edit'])[1]
    Wait Until Page Contains    编辑项目
    Wait Until Page Contains    学位
    Wait Until Page Contains    部门名称
    Wait Until Page Contains    项目名称 (泰文)
    Wait Until Page Contains    项目名称 (英文)
    Wait Until Page Contains    项目名称 (中文)
    Wait Until Page Contains    提交
    Wait Until Page Contains    取消 
    # Back to index.blade.php
    Click Element    xpath=(//a[contains(@href, '/programs')])[2]
    # Verify Delete Message
    Click Element    xpath=(//button[@title='Delete'])[1]
    Wait Until Page Contains    您确定要删除此基金吗？
    Wait Until Page Contains    您将无法恢复已删除的数据！
    Wait Until Page Contains    取消
    Wait Until Page Contains    提交
    # Back to index.blade.php
    Click Element    xpath=//button[@class='swal-button swal-button--cancel']