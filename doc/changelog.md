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
