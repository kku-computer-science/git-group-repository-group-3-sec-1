*** Settings ***
Library    SeleniumLibrary
Library    Collections
# Test Setup    Setup Test Environment
Suite Setup     Open Browser To Home Page
Suite Teardown  Close Browser

*** Variables ***
${BROWSER}    chrome
${URL}    http://127.0.0.1:8000/
${HOME_URL}    xpath=//a[contains(@href, '/')]  
${DELAY}        0.5                            # Delay ระหว่างขั้นตอน
${LANG_DROPDOWN}    id=navbarDropdownMenuLink
${LANG_MENU}    css=#navbarDropdownMenuLink + .dropdown-menu
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
# =================== Language Switcher Tests ===================
Verify Language Switcher Presence
    # Open Browser    ${URL}    ${BROWSER}
    # Maximize Browser Window
    Wait Until Element Is Visible    ${LANG_DROPDOWN}
    Element Should Be Visible    ${LANG_DROPDOWN}
    # [Teardown]    Close Browser

Verify Language Options Display
    # Open Browser    ${URL}    ${BROWSER}
    # Maximize Browser Window
    Wait Until Element Is Visible    ${LANG_DROPDOWN}
    Click Element    ${LANG_DROPDOWN}
    Wait Until Element Is Visible    ${LANG_MENU}
    Element Should Be Visible    ${THAI_LANG}    
    Element Should Be Visible    ${CN_LANG}   
    # [Teardown]    Close Browser

# =================== English Language Tests ===================
Verify English Home Page
    # Open Browser To Default Language
    Verify Home Page English
    # [Teardown]    Close Browser

Verify English Researchers Navigation
    # Open Browser To Default Language
    Navigate To Researchers And Verify English
    # [Teardown]    Close Browser

Verify English Researcher Profile
    # Open Browser To Default Language
    Navigate To Specific Researcher And Verify English
    # [Teardown]    Close Browser

Verify English Publication Tabs
    # Open Browser To Default Language
    Navigate To Specific Researcher And Verify English
    Verify Publication Tabs English
    # [Teardown]    Close Browser

Verify English Research Project Page
    # Open Browser To Default Language
    Navigate To Research Project And Verify English
    # [Teardown]    Close Browser

Verify English Research Group Page
    # Open Browser To Default Language
    Navigate To Research Group And Verify English
    # [Teardown]    Close Browser

Verify English Reports Page
    # Open Browser To Default Language
    Navigate To Reports And Verify English
    # [Teardown]    Close Browser

# =================== Thai Language Tests ===================
Verify Thai Home Page
    # Open Browser And Switch To Thai
    Verify Home Page Thai
    # [Teardown]    Close Browser

Verify Thai Researchers Navigation
    # Open Browser And Switch To Thai
    Navigate To Researchers And Verify Thai
    # [Teardown]    Close Browser

Verify Thai Researcher Profile
    # Open Browser And Switch To Thai
    Navigate To Specific Researcher And Verify Thai
    # [Teardown]    Close Browser

Verify Thai Publication Tabs
    # Open Browser And Switch To Thai
    Navigate To Specific Researcher And Verify Thai
    Verify Publication Tabs Thai
    # [Teardown]    Close Browser

Verify Thai Research Project Page
    # Open Browser And Switch To Thai
    Navigate To Research Project And Verify Thai
    # [Teardown]    Close Browser

Verify Thai Research Group Page
    # Open Browser And Switch To Thai
    Navigate To Research Group And Verify Thai
    # [Teardown]    Close Browser

Verify Thai Reports Page
    # Open Browser And Switch To Thai
    Navigate To Reports And Verify Thai
    # [Teardown]    Close Browser

# =================== Chinese Language Tests ===================
Verify Chinese Home Page
    # Open Browser And Switch To Chinese
    Verify Home Page Chinese
    # [Teardown]    Close Browser

Verify Chinese Researchers Navigation
    # Open Browser And Switch To Chinese
    Navigate To Researchers And Verify Chinese
    # [Teardown]    Close Browser

Verify Chinese Researcher Profile
    # Open Browser And Switch To Chinese
    Navigate To Specific Researcher And Verify Chinese
    # [Teardown]    Close Browser

Verify Chinese Publication Tabs
    # Open Browser And Switch To Chinese
    Navigate To Specific Researcher And Verify Chinese
    Verify Publication Tabs Chinese
    # [Teardown]    Close Browser

Verify Chinese Research Project Page
    # Open Browser And Switch To Chinese
    Navigate To Research Project And Verify Chinese
    # [Teardown]    Close Browser

Verify Chinese Research Group Page
    # Open Browser And Switch To Chinese
    Navigate To Research Group And Verify Chinese
    # [Teardown]    Close Browser

Verify Chinese Reports Page
    # Open Browser And Switch To Chinese
    Navigate To Reports And Verify Chinese
    # [Teardown]    Close Browser

*** Keywords ***
# =================== Setup and General Keywords ===================
Open Browser To Home Page
    Open Browser    ${URL}    ${BROWSER}
    Maximize Browser Window
    Set Selenium Speed    ${DELAY}    

#Open Browser To Default Language
#    Open Browser    ${URL}    ${BROWSER}
#    Maximize Browser Window

Open Browser And Switch To Thai
    Open Browser To Default Language
    Switch Language    th

Open Browser And Switch To Chinese
    Open Browser To Default Language
    Switch Language    cn

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

Verify Major Options Display    
    Wait Until Element Is Visible    ${MAJOR_DROPDOWN}
    Click Element    ${MAJOR_DROPDOWN}
    Wait Until Element Is Visible    ${MAJOR_MENU}
    Element Should Be Visible    ${CS_MAJOR}    
    Element Should Be Visible    ${IT_MAJOR}   
    Element Should Be Visible    ${GIS_MAJOR}

# =================== Home Page Keywords ===================
Verify Home Page English
    Wait Until Page Contains    Home
    Wait Until Element Is Visible    css=#all .count-text
    ${text}=    Get Text    css=#all .count-text
    Should Be Equal As Strings    ${text}    source
    Wait Until Page Contains    Publications (In the Last 5 Years)

Verify Home Page Thai
    Click Element    ${HOME_URL}
    Switch Language    th
    Wait Until Page Contains    หน้าแรก
    Wait Until Element Is Visible    css=#all .count-text
    ${text}=    Get Text    css=#all .count-text
    Should Be Equal As Strings    ${text}    ที่มา
    Wait Until Page Contains    ผลงานตีพิมพ์ (5 ปี ย้อนหลัง)

Verify Home Page Chinese
    Click Element    ${HOME_URL}
    Switch Language    cn
    Wait Until Page Contains    主页
    Wait Until Element Is Visible    css=#all .count-text
    ${text}=    Get Text    css=#all .count-text
    Should Be Equal As Strings    ${text}    来源
    Wait Until Page Contains    出版物（过去5年）

# =================== Researchers Keywords ===================
Navigate To Researchers And Verify English
    Wait Until Page Contains    Researchers
    Verify Major Options Display
    Click Element    ${CS_MAJOR}
    Wait Until Page Contains    Researchers
    Wait Until Page Contains    Computer Science
    Verify Major Options Display

    Click Element    ${IT_MAJOR}
    Wait Until Page Contains    Researchers
    Wait Until Page Contains    Infomation Technology
    Verify Major Options Display

    Click Element    ${GIS_MAJOR} 
    Wait Until Page Contains    Researchers
    Wait Until Page Contains    Geo-Informatics

Navigate To Researchers And Verify Thai
    Wait Until Page Contains    ผู้วิจัย
    Verify Major Options Display
    Click Element    ${CS_MAJOR}
    Wait Until Page Contains    ผู้วิจัย
    Wait Until Page Contains    สาขาวิชาวิทยาการคอมพิวเตอร์
    Verify Major Options Display

    Click Element    ${IT_MAJOR}
    Wait Until Page Contains    ผู้วิจัย
    Wait Until Page Contains    สาขาวิชาเทคโนโลยีสารสนเทศ
    Verify Major Options Display

    Click Element    ${GIS_MAJOR}     
    Wait Until Page Contains    ผู้วิจัย
    Wait Until Page Contains    สาขาวิชาภูมิสารสนเทศศาสตร์

Navigate To Researchers And Verify Chinese
    Wait Until Page Contains    研究人员
    Verify Major Options Display
    Click Element    ${CS_MAJOR}
    Wait Until Page Contains    研究人员
    Wait Until Page Contains     计算机科学与技术
    Verify Major Options Display

    Click Element    ${IT_MAJOR}
    Wait Until Page Contains    研究人员
    Wait Until Page Contains    信息科学与技术
    Verify Major Options Display

    Click Element    ${GIS_MAJOR} 
    Wait Until Page Contains    研究人员
    Wait Until Page Contains    地理信息系统    

# =================== Researcher Profile Keywords ===================
Navigate To Specific Researcher And Verify English
    Verify Major Options Display
    Click Element    ${CS_MAJOR}
    Click Element    ${CS_RESEARCHER_DEMO}
    Wait Until Page Contains    Assoc. Prof. Dr. Punyaphol Horata
    Wait Until Page Contains    Associate Professor
    Wait Until Page Contains    Email
    Wait Until Page Contains    Education
    Wait Until Page Contains    Publications

Navigate To Specific Researcher And Verify Thai
    Verify Major Options Display
    Click Element    ${CS_MAJOR}
    Click Element    ${CS_RESEARCHER_DEMO}
    Wait Until Page Contains    รศ.ดร. ปัญญาพล หอระตะ
    Wait Until Page Contains    รองศาสตราจารย์
    Wait Until Page Contains    อีเมล์
    Wait Until Page Contains    การศึกษา
    Wait Until Page Contains    ผลงานตีพิมพ์

Navigate To Specific Researcher And Verify Chinese
    Verify Major Options Display
    Click Element    ${CS_MAJOR}
    Click Element    ${CS_RESEARCHER_DEMO}
    Wait Until Page Contains    副教授 蓬亚蓬 霍拉塔
    Wait Until Page Contains    副教授
    Wait Until Page Contains    电子邮件
    Wait Until Page Contains    教育
    Wait Until Page Contains    出版物

# =================== Publication Tabs Keywords ===================
Verify Publication Tabs English
    # Summary Tab
    Wait Until Page Contains    SUMMARY
    Wait Until Page Contains    Export To Excel
    Verify Summary Tab English
    
    # Scopus Tab
    Click Element    id=scopus-tab
    Wait Until Page Contains    SCOPUS
    Verify Publication Table Headers English
    
    # Web of Science Tab
    Click Element    id=wos-tab
    Wait Until Page Contains    Web of Science
    Verify Publication Table Headers English
    
    # TCI Tab
    Click Element    id=tci-tab
    Wait Until Page Contains    TCI
    Verify Publication Table Headers English
    
    # Book Tab
    Click Element    id=book-tab
    Wait Until Page Contains    Book
    Verify Book Table Headers English
    
    # Patent Tab
    Click Element    id=patent-tab
    Wait Until Page Contains    Other academic work
    Verify Patent Table Headers English

Verify Publication Tabs Thai
    # Summary Tab
    Wait Until Page Contains    โดยรวม
    Wait Until Page Contains    ส่งออกเป็นไฟล์ Excel
    Verify Summary Tab Thai
    
    # Scopus Tab
    Click Element    id=scopus-tab
    Wait Until Page Contains    SCOPUS
    Verify Publication Table Headers Thai
    
    # Web of Science Tab
    Click Element    id=wos-tab
    Wait Until Page Contains    Web of Science
    Verify Publication Table Headers Thai
    
    # TCI Tab
    Click Element    id=tci-tab
    Wait Until Page Contains    TCI
    Verify Publication Table Headers Thai
    
    # Book Tab
    Click Element    id=book-tab
    Wait Until Page Contains    หนังสือ
    Verify Book Table Headers Thai
    
    # Patent Tab
    Click Element    id=patent-tab
    Wait Until Page Contains    ผลงานวิชาการด้านอื่นๆ
    Verify Patent Table Headers Thai

Verify Publication Tabs Chinese
    # Summary Tab
    Wait Until Page Contains    全面的
    Wait Until Page Contains    导出到文件 Excel
    Verify Summary Tab Chinese
    
    # Scopus Tab
    Click Element    id=scopus-tab
    Wait Until Page Contains    SCOPUS
    Verify Publication Table Headers Chinese
    
    # Web of Science Tab
    Click Element    id=wos-tab
    Wait Until Page Contains    Web of Science
    Verify Publication Table Headers Chinese
    
    # TCI Tab
    Click Element    id=tci-tab
    Wait Until Page Contains    TCI
    Verify Publication Table Headers Chinese
    
    # Book Tab
    Click Element    id=book-tab
    Wait Until Page Contains    书籍
    Verify Book Table Headers Chinese
    
    # Patent Tab
    Click Element    id=patent-tab
    Wait Until Page Contains    其他学术作品
    Verify Patent Table Headers Chinese

# =================== Publications Table Headers ===================
Verify Summary Tab English
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

Verify Summary Tab Thai
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

Verify Summary Tab Chinese
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

Verify Publication Table Headers English
    Wait Until Page Contains    No.
    Wait Until Page Contains    Year
    Wait Until Page Contains    Paper 
    Wait Until Page Contains    Author
    Wait Until Page Contains    Document Type
    Wait Until Page Contains    Page
    Wait Until Page Contains    Journals/Transactions
    Wait Until Page Contains    Citations
    Wait Until Page Contains    Doi

Verify Publication Table Headers Thai
    Wait Until Page Contains    ลำดับที่
    Wait Until Page Contains    ปี
    Wait Until Page Contains    ชื่อเอกสาร 
    Wait Until Page Contains    ผู้เขียน
    Wait Until Page Contains    ประเภทเอกสาร
    Wait Until Page Contains    หน้า
    Wait Until Page Contains    วารสาร/ธุรกรรม
    Wait Until Page Contains    การอ้างอิง
    Wait Until Page Contains    doi

Verify Publication Table Headers Chinese
    Wait Until Page Contains    编号
    Wait Until Page Contains    年份
    Wait Until Page Contains    论文名称 
    Wait Until Page Contains    作者
    Wait Until Page Contains    文档类型
    Wait Until Page Contains    页数
    Wait Until Page Contains    期刊/交易
    Wait Until Page Contains    引用
    Wait Until Page Contains    DOI

Verify Book Table Headers English
    Wait Until Page Contains    No.
    Wait Until Page Contains    Year
    Wait Until Page Contains    Name 
    Wait Until Page Contains    Author
    Wait Until Page Contains    Place of publication
    Wait Until Page Contains    Page

Verify Book Table Headers Thai
    Wait Until Page Contains    ลำดับที่
    Wait Until Page Contains    ปี
    Wait Until Page Contains    ชื่อ 
    Wait Until Page Contains    ผู้เขียน
    Wait Until Page Contains    สถานที่ตีพิมพ์
    Wait Until Page Contains    หน้า

Verify Book Table Headers Chinese
    Wait Until Page Contains    编号
    Wait Until Page Contains    年份
    Wait Until Page Contains    姓名 
    Wait Until Page Contains    作者
    Wait Until Page Contains    出版地
    Wait Until Page Contains    页数

Verify Patent Table Headers English
    Wait Until Page Contains    No.
    Wait Until Page Contains    Name
    Wait Until Page Contains    Author 
    Wait Until Page Contains    Type
    Wait Until Page Contains    Place of publication
    Wait Until Page Contains    Register date

Verify Patent Table Headers Thai
    Wait Until Page Contains    ลำดับที่
    Wait Until Page Contains    ชื่อ 
    Wait Until Page Contains    ผู้เขียน
    Wait Until Page Contains    ประเภท
    Wait Until Page Contains    สถานที่ตีพิมพ์
    Wait Until Page Contains    วันที่จดทะเบียน

Verify Patent Table Headers Chinese
    Wait Until Page Contains    编号
    Wait Until Page Contains    姓名
    Wait Until Page Contains    作者 
    Wait Until Page Contains    类型
    Wait Until Page Contains    出版地
    Wait Until Page Contains    注册日期

# =================== Research Project Keywords ===================
Navigate To Research Project And Verify English
    Click Element    ${RESEARCH_PROJECT_URL}
    Wait Until Page Contains    Research Project
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

Navigate To Research Project And Verify Thai
    Click Element    ${RESEARCH_PROJECT_URL}
    Wait Until Page Contains    โครงการวิจัย
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

Navigate To Research Project And Verify Chinese
    Click Element    ${RESEARCH_PROJECT_URL}
    Wait Until Page Contains    研究项目
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

# =================== Research Group Keywords ===================
Navigate To Research Group And Verify English
    Click Element    ${RESEARCH_GROUP_URL}
    Wait Until Page Contains    Research Group
    Wait Until Page Contains    Research Group
    Wait Until Page Contains    Laboratory Supervisor
    Click Element    ${RESEARCH_GROUP_DEMO}
    Wait Until Page Contains    Laboratory Supervisor
    Wait Until Page Contains    Student

Navigate To Research Group And Verify Thai
    Click Element    ${RESEARCH_GROUP_URL}
    Wait Until Page Contains    กลุ่มวิจัย
    Wait Until Page Contains    กลุ่มวิจัย
    Wait Until Page Contains    ผู้ดูแลแล็ป
    Click Element    ${RESEARCH_GROUP_DEMO}
    Wait Until Page Contains    ผู้ดูแลแล็ป
    Wait Until Page Contains    นักเรียน

Navigate To Research Group And Verify Chinese
    Click Element    ${RESEARCH_GROUP_URL}
    Wait Until Page Contains    研究小组
    Wait Until Page Contains    研究小组
    Wait Until Page Contains    实验室主管
    Click Element    ${RESEARCH_GROUP_DEMO}
    Wait Until Page Contains    实验室主管
    Wait Until Page Contains    S学生

# =================== Reports Keywords ===================
Navigate To Reports And Verify English
    Click Element    ${REPORT_URL}
    Wait Until Page Contains    Reports
    Wait Until Page Contains    Total number of articles statistics for 5 years
    Wait Until Page Contains    Statistics on the number of articles cited
    Wait Until Page Contains    source

Navigate To Reports And Verify Thai
    Click Element    ${REPORT_URL}
    Wait Until Page Contains    รายงาน
    Wait Until Page Contains    สถิติจำนวนบทความทั้งหมด 5 ปี
    Wait Until Page Contains    สถิติจำนวนบทความที่ได้รับการอ้างอิง
    Wait Until Page Contains    ที่มา

Navigate To Reports And Verify Chinese
    Click Element    ${REPORT_URL}
    Wait Until Page Contains    报告
    Wait Until Page Contains    5年总文章数统计
    Wait Until Page Contains    文章被引次数统计
    Wait Until Page Contains    来源