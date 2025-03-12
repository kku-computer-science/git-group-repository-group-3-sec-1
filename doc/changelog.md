

# [Released] -2025-03-11

## Main page

### Researchers listing page
- Now shows all researchers's profile pictures and informations.
- Now shows the list of research interests accordingly to the language setting and will substitute them in other language if the selected one isn't defined, same case applied to the researcher's first name and last name
- The search functionality for Research Interests can now search in all languages.

### Researcher Profile Page
- Temporary replaced the published year graph to the count graph due to issues with inaccurate sorting.
- Education will now state if there's no information for that section instead of showing blank.
- Improved Author and Teacher's name spacing
- Author and Teacher's name, Paper name will now show accordingly to the language setting and will substitute with other available language if the selected one isn't defined.
- Page, Doi, Place of publication will now state if there's no information for that section instead of showing blank.

### Research Project Page
- Project Duration will now state if there's no information available instead of showing blank.
- Project Name, and everything within the page will now show the data accordingly to the language setting and will substitute with other languages if the selected one isn't defined.

## Dashboard

### Show page , Index page for all aspect
- Will now show information accordingly to the language setting, this includes the year format, the name of the researchers, author, paper , abstract, etc and will substitute with other language if the selected one is null.

### Create page, Edit page for all aspect
- Now has fields for Author name, Abstract , Book name, and etc in all three languages.
- The drop down option for internal researchers now shows the name accordingly to the language setting and will substitute with other language if the selected one is null.

#### Notable improvements
- The Department can now be edited, created and shown in all three languages.
- The Expertises can now be edited in all three languages, it now also shows the researcher's name accordingly to languages and will substitute if null.
- The Abstract can now be shown in all three languages.
- Various language options for multiple data has been implemented.
- If data has language options then it will display accordingly to the language setting and will substitute to other language if the selected one is null.

### UAT for Language Switch (Thai, English, Chinese)  
- Conducted UAT testing using Robot Framework to verify the language switching functionality.
- The tests included language switches between English, Thai, and Chinese across different user roles such as Visitor, Login, Researcher, System Administrator and Administrative Staff
-The tests ensured that the language switch functionality worked correctly for all specified roles and languages.

## [Released] - 2025-02-12

### Added
- Integrated Google Scholar API and Web of Science API to fetch academic papers.
- Implemented a feature to check if a paper already exists in the database before saving.
- If a paper fetched from the APIs does not already exist in the database, it will now be saved.
- Added functionality to store fetched paper data in the database, including metadata such as:
  - Title
  - Authors
  - Publication year
  - Journal/Conference name
  - Citation count