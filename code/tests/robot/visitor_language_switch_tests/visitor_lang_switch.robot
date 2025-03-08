*** Settings ***
Library    SeleniumLibrary
Library    Collections

*** Variables ***
${BROWSER}    chrome
${URL}    http://127.0.0.1:8000/
${LANG_DROPDOWN}    id=navbarDropdownMenuLink
${LANG_MENU}    css=#navbarDropdownMenuLink + .dropdown-menu  # More specific selector
${THAI_LANG}    xpath=//a[contains(@href, '/lang/th')]
${ENG_LANG}    xpath=//a[contains(@href, '/lang/en')]
${CN_LANG}    xpath=//a[contains(@href, '/lang/cn')]
${MAJOR_DROPDOWN}    id=navbarDropdown
${CS_MAJOR}    xpath=//a[contains(@href, '/researchers/1')]
${IT_MAJOR}    xpath=//a[contains(@href, '/researchers/2')]
${GIS_MAJOR}    xpath=//a[contains(@href, '/researchers/3')]
${MAJOR_MENU}    css=#navbarDropdown
${CS_RESEARCHER_DEMO}    xpath=//div[@class='row row-cols-1 row-cols-md-2 g-0']/a[2]
${RESEARCH_PROJECT_URL}    xpath=//a[contains(@href, '/researchproject')]
${RESEARCH_GROUP_URL}    xpath=//a[contains(@href, '/researchgroup')]
${RESEARCH_GROUP_DEMO}    xpath=//a[contains(@href, '/researchgroupdetail/3')]   
${REPORT_URL}    xpath=//a[contains(@href, '/reports')]

*** Test Cases ***
Verify Language Switcher Presence
    Open Browser    ${URL}    ${BROWSER}
    Maximize Browser Window
    Wait Until Element Is Visible    ${LANG_DROPDOWN}
    Element Should Be Visible    ${LANG_DROPDOWN}
    [Teardown]    Close Browser

Verify Language Options Display
    Open Browser    ${URL}    ${BROWSER}
    Maximize Browser Window
    Wait Until Element Is Visible    ${LANG_DROPDOWN}
    Click Element    ${LANG_DROPDOWN}
    Wait Until Element Is Visible    ${LANG_MENU}
    Element Should Be Visible    ${THAI_LANG}    
    Element Should Be Visible    ${CN_LANG}   
    [Teardown]    Close Browser

Verify Default Language IsEnglish
    Open Browser    ${URL}    ${BROWSER}
    Maximize Browser Window
    # ======================== Home ========================
    # Check Home navbar name
    Wait Until Page Contains    Home    # Verify English content without switching
    # Check Home's content     
    Wait Until Element Is Visible    css=#all .count-text
    ${text}=    Get Text    css=#all .count-text
    Should Be Equal As Strings    ${text}    source
    Wait Until Page Contains    Publications (In the Last 5 Years)

    # ======================== Researchers ========================
    # Check Researchers navbar name
    Wait Until Page Contains    Researchers
    # Check All Major options
    Verify Major Options Display
    # Go to CS Major
    Click Element    ${CS_MAJOR}
    # Verify Element in CS Major
    Wait Until Page Contains    Researchers
    Wait Until Page Contains     Computer Science
    Verify Major Options Display
    Click Element    ${IT_MAJOR}
    # Verify Element in IT Major
    Wait Until Page Contains    Researchers
    Wait Until Page Contains     Infomation Technology
    Verify Major Options Display
    Click Element    ${GIS_MAJOR}
    # Verify Element in GIS Major
    Wait Until Page Contains    Researchers
    Wait Until Page Contains     Geo-Informatics
    Verify Major Options Display
    # Back to CS Major
    Click Element    ${CS_MAJOR}

    # Choose Researcher Profile 
    Click Element    ${CS_RESEARCHER_DEMO}    
    # Verify Element in Researcher Profile
    Wait Until Page Contains    Assoc. Prof. Dr. Punyaphol Horata
    Wait Until Page Contains    Associate Professor
    Wait Until Page Contains    Email
    Wait Until Page Contains    Education
    Wait Until Page Contains    Publications
    # Verify Summary Tab
    Wait Until Page Contains    SUMMARY
    Wait Until Page Contains    Export To Excel
    Wait Until Page Contains    No.
    Wait Until Page Contains    Year
    Wait Until Page Contains    Paper 
    Wait Until Page Contains    Author
    Wait Until Page Contains    Document Type
    Wait Until Page Contains    Page
    Wait Until Page Contains    Journals/Transactions
    Wait Until Page Contains    Citations
    Wait Until Page Contains    Doi
    Wait Until Page Contains    source    
    # Verify Scopus Tab    
    Click Element    id=scopus-tab
    Wait Until Page Contains    SCOPUS
    Wait Until Page Contains    No.
    Wait Until Page Contains    Year
    Wait Until Page Contains    Paper 
    Wait Until Page Contains    Author
    Wait Until Page Contains    Document Type
    Wait Until Page Contains    Page
    Wait Until Page Contains    Journals/Transactions
    Wait Until Page Contains    Citations
    Wait Until Page Contains    Doi    
    # Verify Web of Science Tab
    Click Element    id=wos-tab
    Wait Until Page Contains    Web of Science
    Wait Until Page Contains    No.
    Wait Until Page Contains    Year
    Wait Until Page Contains    Paper 
    Wait Until Page Contains    Author
    Wait Until Page Contains    Document Type
    Wait Until Page Contains    Page
    Wait Until Page Contains    Journals/Transactions
    Wait Until Page Contains    Citations
    Wait Until Page Contains    Doi   
    # Verify TCI Tab    
    Click Element    id=tci-tab
    Wait Until Page Contains    TCI
    Wait Until Page Contains    No.
    Wait Until Page Contains    Year
    Wait Until Page Contains    Paper 
    Wait Until Page Contains    Author
    Wait Until Page Contains    Document Type
    Wait Until Page Contains    Page
    Wait Until Page Contains    Journals/Transactions
    Wait Until Page Contains    Citations
    Wait Until Page Contains    Doi   
    # Verify Book Tab  
    Click Element    id=book-tab
    Wait Until Page Contains    Book
    Wait Until Page Contains    No.
    Wait Until Page Contains    Year
    Wait Until Page Contains    Name 
    Wait Until Page Contains    Author
    Wait Until Page Contains    Place of publication
    Wait Until Page Contains    Page
    # Verify Other Academic Work
    Click Element    id=patent-tab
    Wait Until Page Contains    Other academic work
    Wait Until Page Contains    No.
    Wait Until Page Contains    Name
    Wait Until Page Contains    Author 
    Wait Until Page Contains    Type
    Wait Until Page Contains    Place of publication
    Wait Until Page Contains    Register date

    # ======================== Research Project ========================
    # Choose Research Project
    Click Element    ${RESEARCH_PROJECT_URL}    
    # Check Research Project navbar name
    Wait Until Page Contains    Research Project
    # Check Research Project content  
    Wait Until Page Contains    Academic service projects/ research projects
    Wait Until Page Contains    No.
    Wait Until Page Contains    year
    Wait Until Page Contains    Project Name
    Wait Until Page Contains    Details
    Wait Until Page Contains    Project Manager
    Wait Until Page Contains    Status
    Wait Until Page Contains    Project Duration
    Wait Until Page Contains    Research Fund Type
    Wait Until Page Contains    Funding Agency
    Wait Until Page Contains    Responsible Department
    Wait Until Page Contains    Budget Allocated    

    # ======================== Research Group ========================
    # Choose Research Group
    Click Element    ${RESEARCH_GROUP_URL}    
    # Check Research Group navbar name
    Wait Until Page Contains    Research Group
    # Check Research Project content  
    Wait Until Page Contains    Research Group
    Wait Until Page Contains    Laboratory Supervisor
    # Go to Advanced GIS Technology (AGT)
    Click Element    ${RESEARCH_GROUP_DEMO}
    Wait Until Page Contains    Laboratory Supervisor
    Wait Until Page Contains    Student

    # ======================== Reports ========================
    # Choose Reports
    Click Element    ${REPORT_URL}    
    # Check Report navbar name
    Wait Until Page Contains    Reports
    # Check Report content
    Wait Until Page Contains    Total number of articles statistics for 5 years
    Wait Until Page Contains    Statistics on the number of articles cited
    Wait Until Page Contains    source
    [Teardown]    Close Browser

Verify Language Switch to Thai
    Open Browser    ${URL}    ${BROWSER}
    Maximize Browser Window
    Switch Language    th
    # ======================== หน้าแรก ========================
    # Check Home navbar name
    Wait Until Page Contains    หน้าแรก
    # Check Home's content     
    Wait Until Element Is Visible    css=#all .count-text
    ${text}=    Get Text    css=#all .count-text
    Should Be Equal As Strings    ${text}    ที่มา
    Wait Until Page Contains    ผลงานตีพิมพ์ (5 ปี ย้อนหลัง)

    # ======================== ผู้วิจัย ========================
    # Check Researchers navbar name
    Wait Until Page Contains    ผู้วิจัย
    # Check All Major options
    Verify Major Options Display
    # Go to CS Major
    Click Element    ${CS_MAJOR}
    # Verify Element in CS Major
    Wait Until Page Contains    ผู้วิจัย
    Wait Until Page Contains    สาขาวิชาวิทยาการคอมพิวเตอร์
    Verify Major Options Display
    Click Element    ${IT_MAJOR}
    # Verify Element in IT Major
    Wait Until Page Contains    ผู้วิจัย
    Wait Until Page Contains     สาขาวิชาเทคโนโลยีสารสนเทศ
    Verify Major Options Display
    Click Element    ${GIS_MAJOR}
    # Verify Element in GIS Major
    Wait Until Page Contains    ผู้วิจัย
    Wait Until Page Contains     สาขาวิชาภูมิสารสนเทศศาสตร์
    Verify Major Options Display
    # Back to CS Major
    Click Element    ${CS_MAJOR}
    # Choose Researcher Profile 
    Click Element    ${CS_RESEARCHER_DEMO}    
    # Verify Element in Researcher Profile
    Wait Until Page Contains    รศ.ดร. ปัญญาพล หอระตะ
    Wait Until Page Contains    รองศาสตราจารย์
    Wait Until Page Contains    อีเมล์
    Wait Until Page Contains    การศึกษา
    Wait Until Page Contains    ผลงานตีพิมพ์
    # Verify Summary Tab
    Wait Until Page Contains    โดยรวม
    Wait Until Page Contains    ส่งออกเป็นไฟล์ Excel
    Wait Until Page Contains    ลำดับที่
    Wait Until Page Contains    ปี
    Wait Until Page Contains    ชื่อเอกสาร 
    Wait Until Page Contains    ผู้เขียน
    Wait Until Page Contains    ประเภทเอกสาร
    Wait Until Page Contains    หน้า
    Wait Until Page Contains    วารสาร/ธุรกรรม
    Wait Until Page Contains    การอ้างอิง
    Wait Until Page Contains    doi
    Wait Until Page Contains    ที่มา    
    # Verify Scopus Tab    
    Click Element    id=scopus-tab
    Wait Until Page Contains    SCOPUS
    Wait Until Page Contains    ลำดับที่
    Wait Until Page Contains    ปี
    Wait Until Page Contains    ชื่อเอกสาร 
    Wait Until Page Contains    ผู้เขียน
    Wait Until Page Contains    ประเภทเอกสาร
    Wait Until Page Contains    หน้า
    Wait Until Page Contains    วารสาร/ธุรกรรม
    Wait Until Page Contains    การอ้างอิง
    Wait Until Page Contains    doi
    # Verify Web of Science Tab
    Click Element    id=wos-tab
    Wait Until Page Contains    Web of Science
    Wait Until Page Contains    ลำดับที่
    Wait Until Page Contains    ปี
    Wait Until Page Contains    ชื่อเอกสาร 
    Wait Until Page Contains    ผู้เขียน
    Wait Until Page Contains    ประเภทเอกสาร
    Wait Until Page Contains    หน้า
    Wait Until Page Contains    วารสาร/ธุรกรรม
    Wait Until Page Contains    การอ้างอิง
    Wait Until Page Contains    doi
    # Verify TCI Tab    
    Click Element    id=tci-tab
    Wait Until Page Contains    TCI
    Wait Until Page Contains    ลำดับที่
    Wait Until Page Contains    ปี
    Wait Until Page Contains    ชื่อเอกสาร 
    Wait Until Page Contains    ผู้เขียน
    Wait Until Page Contains    ประเภทเอกสาร
    Wait Until Page Contains    หน้า
    Wait Until Page Contains    วารสาร/ธุรกรรม
    Wait Until Page Contains    การอ้างอิง
    Wait Until Page Contains    doi
    # Verify Book Tab  
    Click Element    id=book-tab
    Wait Until Page Contains    หนังสือ
    Wait Until Page Contains    ลำดับที่
    Wait Until Page Contains    ปี
    Wait Until Page Contains    ชื่อ 
    Wait Until Page Contains    ผู้เขียน
    Wait Until Page Contains    สถานที่ตีพิมพ์
    Wait Until Page Contains    หน้า
    # Verify Other Academic Work
    Click Element    id=patent-tab
    Wait Until Page Contains    ผลงานวิชาการด้านอื่นๆ
    Wait Until Page Contains    ลำดับที่
    Wait Until Page Contains    ชื่อ 
    Wait Until Page Contains    ผู้เขียน
    Wait Until Page Contains    ประเภท
    Wait Until Page Contains    สถานที่ตีพิมพ์
    Wait Until Page Contains    วันที่จดทะเบียน

    # ======================== โครงการวิจัย ========================
    # Choose Research Project
    Click Element    ${RESEARCH_PROJECT_URL}    
    # Check Research Project navbar name
    Wait Until Page Contains    โครงการวิจัย
    # Check Research Project content  
    Wait Until Page Contains    โครงการบริการวิชาการ/ โครงการวิจัย
    Wait Until Page Contains    ลำดับ
    Wait Until Page Contains    ปี
    Wait Until Page Contains    ชื่อโครงการ 
    Wait Until Page Contains    รายละเอียด
    Wait Until Page Contains    ผู้รับผิดชอบโครงการ
    Wait Until Page Contains    สถานะ
    Wait Until Page Contains    ระยะเวลาโครงการ
    Wait Until Page Contains    ประเภททุนวิจัย
    Wait Until Page Contains    หน่วยงานที่สนันสนุนทุน
    Wait Until Page Contains    หน่วยงานที่รับผิดชอบ
    Wait Until Page Contains    งบประมาณที่ได้รับจัดสรร

    # ======================== กลุ่มวิจัย ========================
    # Choose Research Group
    Click Element    ${RESEARCH_GROUP_URL}    
    # Check Research Group navbar name
    Wait Until Page Contains    กลุ่มวิจัย
    # Check Research Project content  
    Wait Until Page Contains    กลุ่มวิจัย
    Wait Until Page Contains    ผู้ดูแลแล็ป
    # Go to Advanced GIS Technology (AGT)
    Click Element    ${RESEARCH_GROUP_DEMO}
    Wait Until Page Contains    ผู้ดูแลแล็ป
    Wait Until Page Contains    นักเรียน

    # ======================== รายงาน ========================
    # Choose Reports
    Click Element    ${REPORT_URL}    
    # Check Report navbar name
    Wait Until Page Contains    รายงาน
    # Check Report content
    Wait Until Page Contains    สถิติจำนวนบทความทั้งหมด 5 ปี
    Wait Until Page Contains    สถิติจำนวนบทความที่ได้รับการอ้างอิง
    Wait Until Page Contains    ที่มา
    [Teardown]    Close Browser

Verify Language Switch to Chinese
    Open Browser    ${URL}    ${BROWSER}
    Maximize Browser Window
    Switch Language    cn
    # ======================== Home ========================
    # Check Home navbar name
    Wait Until Page Contains    主页
    # Check Home's content     
    Wait Until Element Is Visible    css=#all .count-text
    ${text}=    Get Text    css=#all .count-text
    Should Be Equal As Strings    ${text}    来源
    Wait Until Page Contains    出版物（过去5年）

    # ======================== Researchers ========================
    # Check Researchers navbar name
    Wait Until Page Contains    研究人员
    # Check All Major options
    Verify Major Options Display
    # Go to CS Major
    Click Element    ${CS_MAJOR}
    # Verify Element in CS Major
    Wait Until Page Contains    研究人员
    Wait Until Page Contains     计算机科学与技术
    Verify Major Options Display
    Click Element    ${IT_MAJOR}
    # Verify Element in IT Major
    Wait Until Page Contains    研究人员
    Wait Until Page Contains     信息科学与技术
    Verify Major Options Display
    Click Element    ${GIS_MAJOR}
    # Verify Element in GIS Major
    Wait Until Page Contains    研究人员
    Wait Until Page Contains     地理信息系统
    Verify Major Options Display
    # Back to CS Major
    Click Element    ${CS_MAJOR}
    # Choose Researcher Profile 
    Click Element    ${CS_RESEARCHER_DEMO}    
    # Verify Element in Researcher Profile
    Wait Until Page Contains    副教授 蓬亚蓬 霍拉塔
    Wait Until Page Contains    副教授
    Wait Until Page Contains    电子邮件
    Wait Until Page Contains    教育
    Wait Until Page Contains    出版物
    # Verify Summary Tab
    Wait Until Page Contains    全面的
    Wait Until Page Contains    导出到文件 Excel
    Wait Until Page Contains    编号
    Wait Until Page Contains    年份
    Wait Until Page Contains    论文名称 
    Wait Until Page Contains    作者
    Wait Until Page Contains    文档类型
    Wait Until Page Contains    页数
    Wait Until Page Contains    期刊/交易
    Wait Until Page Contains    引用
    Wait Until Page Contains    DOI
    Wait Until Page Contains    来源   
    # Verify Scopus Tab    
    Click Element    id=scopus-tab
    Wait Until Page Contains    SCOPUS
    Wait Until Page Contains    编号
    Wait Until Page Contains    年份
    Wait Until Page Contains    论文名称 
    Wait Until Page Contains    作者
    Wait Until Page Contains    文档类型
    Wait Until Page Contains    页数
    Wait Until Page Contains    期刊/交易
    Wait Until Page Contains    引用
    Wait Until Page Contains    DOI 
    # Verify Web of Science Tab
    Click Element    id=wos-tab
    Wait Until Page Contains    Web of Science
    Wait Until Page Contains    编号
    Wait Until Page Contains    年份
    Wait Until Page Contains    论文名称 
    Wait Until Page Contains    作者
    Wait Until Page Contains    文档类型
    Wait Until Page Contains    页数
    Wait Until Page Contains    期刊/交易
    Wait Until Page Contains    引用
    Wait Until Page Contains    DOI 
    # Verify TCI Tab    
    Click Element    id=tci-tab
    Wait Until Page Contains    TCI
    Wait Until Page Contains    编号
    Wait Until Page Contains    年份
    Wait Until Page Contains    论文名称 
    Wait Until Page Contains    作者
    Wait Until Page Contains    文档类型
    Wait Until Page Contains    页数
    Wait Until Page Contains    期刊/交易
    Wait Until Page Contains    引用
    Wait Until Page Contains    DOI
    # Verify Book Tab  
    Click Element    id=book-tab
    Wait Until Page Contains    书籍
    Wait Until Page Contains    编号
    Wait Until Page Contains    年份
    Wait Until Page Contains    姓名 
    Wait Until Page Contains    作者
    Wait Until Page Contains    出版地
    Wait Until Page Contains    页数
    # Verify Other Academic Work
    Click Element    id=patent-tab
    Wait Until Page Contains    其他学术作品
    Wait Until Page Contains    编号
    Wait Until Page Contains    姓名
    Wait Until Page Contains    作者 
    Wait Until Page Contains    类型
    Wait Until Page Contains    出版地
    Wait Until Page Contains    注册日期

    # ======================== Research Project ========================
    # Choose Research Project
    Click Element    ${RESEARCH_PROJECT_URL}    
    # Check Research Project navbar name
    Wait Until Page Contains    研究项目
    # Check Research Project content  
    Wait Until Page Contains    学术服务项目/研究项目
    Wait Until Page Contains    序号
    Wait Until Page Contains    年份
    Wait Until Page Contains    项目名称
    Wait Until Page Contains    详细信息
    Wait Until Page Contains    项目负责人
    Wait Until Page Contains    状态
    Wait Until Page Contains    项目期限
    Wait Until Page Contains    研究基金类型
    Wait Until Page Contains    资助机构
    Wait Until Page Contains    负责部门
    Wait Until Page Contains    已分配预算  

    # ======================== Research Group ========================
    # Choose Research Group
    Click Element    ${RESEARCH_GROUP_URL}    
    # Check Research Group navbar name
    Wait Until Page Contains    研究小组
    # Check Research Project content  
    Wait Until Page Contains    研究小组
    Wait Until Page Contains    实验室主管
    # Go to Advanced GIS Technology (AGT)
    Click Element    ${RESEARCH_GROUP_DEMO}
    Wait Until Page Contains    实验室主管
    Wait Until Page Contains    S学生

    # ======================== Reports ========================
    # Choose Reports
    Click Element    ${REPORT_URL}    
    # Check Report navbar name
    Wait Until Page Contains    报告
    # Check Report content  
    Wait Until Page Contains    5年总文章数统计
    Wait Until Page Contains    文章被引次数统计
    Wait Until Page Contains    来源
    [Teardown]    Close Browser

*** Keywords ***
Switch Language
    [Arguments]    ${lang}
    # Click language dropdown
    Wait Until Element Is Visible    ${LANG_DROPDOWN}
    Click Element    ${LANG_DROPDOWN}
    
    # Select target language
    Run Keyword If    '${lang}' == 'th'    Click Element    ${THAI_LANG}
    ...    ELSE IF    '${lang}' == 'en'    Click Element    ${ENG_LANG}
    ...    ELSE IF    '${lang}' == 'cn'    Click Element    ${CN_LANG}
    
    # Verify URL and flag update    
    ${flag}=    Set Variable If    '${lang}' == 'th'    th    ${lang}
    Wait Until Element Is Visible    css:#navbarDropdownMenuLink span.flag-icon-${flag}
    
    Log To Console    Switched to language: ${lang}

Verify Major Options Display    
    Wait Until Element Is Visible    ${MAJOR_DROPDOWN}
    Click Element    ${MAJOR_DROPDOWN}
    Wait Until Element Is Visible    ${MAJOR_MENU}
    Element Should Be Visible    ${CS_MAJOR}    
    Element Should Be Visible    ${IT_MAJOR}   
    Element Should Be Visible    ${GIS_MAJOR}       

Setup Test Environment
    Set Selenium Speed    0.5s
    Set Selenium Timeout    10s