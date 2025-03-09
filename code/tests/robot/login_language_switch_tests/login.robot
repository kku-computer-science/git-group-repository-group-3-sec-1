*** Settings ***
Library    SeleniumLibrary
Library    String

*** Variables ***
${URL}          http://127.0.0.1:8000/login  # URL ของหน้า Login
${BROWSER}      chrome                       # Browser ที่ใช้ทดสอบ
${DELAY}        1                            # Delay ระหว่างขั้นตอน

*** Test Cases ***
Test Language Switching    
    Open Browser To Login Page
    Verify Language    Account Login
    Verify Language    Username
    Verify Language    Password
    Verify Language    Login
    Switch Language    th
    Verify Language    เข้าสู่ระบบ
    Verify Language    ชื่อผู้ใช้
    Verify Language    รหัสผ่าน
    Verify Language    เข้าสู่ระบบ
    Switch Language    cn
    Verify Language    帐户登录
    Verify Language    用户名
    Verify Language    密码
    Verify Language    登录
    [Teardown]    Close Browser

*** Keywords ***
Open Browser To Login Page
    Open Browser    ${URL}    ${BROWSER}
    Maximize Browser Window
    Set Selenium Speed    ${DELAY}

Switch Language
    [Arguments]    ${lang}
    Wait Until Page Contains Element    xpath=//a[@class='nav-link dropdown-toggle' and .//span[contains(@class, 'flag-icon')]]    5s
    Click Element    xpath=//a[@class='nav-link dropdown-toggle' and .//span[contains(@class, 'flag-icon')]]
    Click Element    xpath=//a[contains(@href, 'http://127.0.0.1:8000/lang/${lang}')]
    ${flag}=    Run Keyword If    '${lang}' == 'cn'    Set Variable    cn    ELSE    Set Variable    ${lang}
    Wait Until Page Contains Element    xpath=//span[contains(@class, 'flag-icon-${flag}')]    5s
    Log To Console    Switched to language: ${lang}

Verify Language
    [Arguments]    ${welcome_text}   
    Page Should Contain    ${welcome_text}
    