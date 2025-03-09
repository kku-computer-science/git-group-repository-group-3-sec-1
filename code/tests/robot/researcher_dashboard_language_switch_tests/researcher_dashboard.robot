*** Settings ***
Library    SeleniumLibrary
Suite Setup     Open Browser To Login Page
Suite Teardown  Logout And Close Browser

*** Variables ***
${URL}          http://127.0.0.1:8000/login  # URL ของหน้า Login
${DASHBOARD_URL}        http://127.0.0.1:8000/dashboard
${BROWSER}      chrome                       # Browser ที่ใช้ทดสอบ
${DELAY}        1                            # Delay ระหว่างขั้นตอน
${USERNAME}             chitsutha@kku.ac.th
${PASSWORD}             123456789

*** Test Cases ***
Test Language Switching On Researcher Dashboard        
    [Setup]    Reset Language To English
    [Documentation]    ทดสอบการเปลี่ยนภาษาบนหน้าแดชบอร์ดในส่วนของผู้วิจัย   
    Verify Language    Welcome to the Research Information Management System
    Switch Language    th
    Verify Language    ยินดีต้อนรับเข้าสู่ระบบจัดการข้อมูลวิจัยของสาขาวิชาวิทยาการคอมพิวเตอร์
    Switch Language    cn
    Verify Language    欢迎来到研究信息管理系统   
    
*** Keywords ***
Open Browser To Login Page
    Open Browser    ${URL}    ${BROWSER}
    Maximize Browser Window
    Set Selenium Speed    ${DELAY}
    Login To System

Login To System
    Wait Until Page Contains Element    id=username    5s
    Log To Console    Found username field
    Input Text    id=username    ${USERNAME}
    Input Text    id=password    ${PASSWORD}
    Click Button    xpath=//button[@type='submit']
    Wait Until Location Contains    ${DASHBOARD_URL}    5s
    Log To Console    Login successful, redirected to: ${DASHBOARD_URL}
    Wait Until Page Contains Element    xpath=//a[@class='nav-link dropdown-toggle' and .//span[contains(@class, 'flag-icon')]]    5s

Reset Language To English
    Go To    ${DASHBOARD_URL}  # กลับไป dashboard เพื่อรีเซ็ต
    Wait Until Page Contains Element    xpath=//a[@class='nav-link dropdown-toggle' and .//span[contains(@class, 'flag-icon')]]    5s
    # ถ้าภาษาอังกฤษเป็น default และไม่มี /lang/en ให้คลิกที่ English ใน dropdown
    Click Element    xpath=//a[@class='nav-link dropdown-toggle' and .//span[contains(@class, 'flag-icon')]]
    ${english_present}=    Run Keyword And Return Status    Page Should Contain Element    xpath=//a[@class='dropdown-item' and contains(., 'English')]
    Run Keyword If    ${english_present}    Click Element    xpath=//a[@class='dropdown-item' and contains(., 'English')]
    Wait Until Page Contains Element    xpath=//span[contains(@class, 'flag-icon-us')]    5s
    Log To Console    Reset language to English
    ${page_source}=    Get Source
    Log To Console    Page source after reset: ${page_source}

Switch Language
    [Arguments]    ${lang}
    Wait Until Page Contains Element    xpath=//a[@class='nav-link dropdown-toggle' and .//span[contains(@class, 'flag-icon')]]    15s
    Click Element    xpath=//a[@class='nav-link dropdown-toggle' and .//span[contains(@class, 'flag-icon')]]
    Click Element    xpath=//a[contains(@href, 'http://127.0.0.1:8000/lang/${lang}')]
    ${flag}=    Run Keyword If    '${lang}' == 'cn'    Set Variable    cn    ELSE    Set Variable    ${lang}
    Wait Until Page Contains Element    xpath=//span[contains(@class, 'flag-icon-${flag}')]    10s
    Log To Console    Switched to language: ${lang}

Verify Language
    [Arguments]    ${welcome_text}   
    Page Should Contain    ${welcome_text}

Logout
    # คลิกที่ปุ่มหรือลิงค์สำหรับ Logout
    Click Element    xpath=//a[contains(@href, '/logout')]
    Wait Until Page Contains    Login    5s
    Log To Console    Logged out successfully

Logout And Close Browser
    Logout
    Close Browser
    