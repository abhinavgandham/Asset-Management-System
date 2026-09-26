ASSET MANAGEMENT SYSTEM

Final Product & Technical Project Specification

Portfolio Project - PHP / Laravel / PostgreSQL / REST APIs / Docker /
GitHub / Cloud

Version 1.0 - Final Baseline

Prepared for a staged, achievable portfolio build

# 1. Project Overview

The Asset Management System is a secure web application that allows an
individual user to record, organise, update, search, and share
information about personal assets. Assets can represent very different
real-world items - for example a television, laptop, car, jewellery
item, or house - so the system must support a common core of mandatory
fields plus user-defined custom fields for each asset.

The application is being built as a portfolio project. The goal is not
to reproduce a commercial enterprise asset-management platform. The goal
is to demonstrate a modern, production-oriented PHP engineering workflow
from requirements through design, implementation, testing,
containerisation, CI, deployment and documentation.

# 2. Project Objectives

-   Demonstrate practical proficiency with PHP, Composer and Laravel.

-   Design and use a relational database with PostgreSQL.

-   Design and implement REST APIs using standard HTTP methods and
    status codes.

-   Implement secure authentication, authorisation and validation.

-   Support flexible asset-specific metadata without creating a
    different database table for every asset type.

-   Support file and image attachments.

-   Use Git and GitHub professionally, including branches, pull requests
    and CI checks.

-   Containerise the local application environment with Docker.

-   Deploy the finished MVP to one public cloud provider and expose it
    under a real domain.

-   Create automated tests and developer documentation so another
    developer can run and understand the project.

-   Use AI as a coding assistant while retaining human understanding and
    ownership of architecture and code.

# 3. Scope Strategy

The project will be delivered in stages. Only the MVP is required before
deployment. Features in later versions are deliberately deferred so that
the first release remains achievable.

# 4. Target User

The MVP has one primary persona: an authenticated individual who manages
only their own assets. Multi-tenant organisations, administrators,
enterprise roles and team collaboration are out of scope for v1.0.

# 5. Functional Requirements

## 5.1 User Registration and Authentication

## 5.2 Dashboard

## 5.3 Asset Management

## 5.4 Categories and Status

Categories classify what an asset is. Status describes the asset
lifecycle/state. Both are mandatory on every asset.

-   Seed the system with simple categories such as Electronics,
    Property, Vehicle, Jewellery, Furniture and Other.

-   Seed statuses such as Active, Sold, Lost, Disposed and Inactive.

-   For MVP, categories and statuses may be centrally defined seed data
    rather than fully user-manageable configuration.

-   Design the schema so user-defined categories can be added later
    without major rework.

## 5.5 Custom Asset Fields

Different assets require different metadata. The application must allow
the user to add arbitrary key/value fields to an asset. Example: a TV
may have Brand, Model and Screen Size; a house may have Address, Land
Size and Bedrooms.

## 5.6 Images and File Attachments

## 5.7 Search and Filtering

## 5.8 Sharing and Asset Summary

For MVP, sharing means generating a controlled public URL for an asset
summary. Direct API integration with Facebook, Instagram or X is not
required.

# 6. User Interface Requirements

-   Use server-rendered Laravel Blade templates for the MVP unless the
    developer has a strong reason to add a JavaScript framework.

-   Responsive layout should work reasonably on desktop and mobile-sized
    screens.

-   Primary navigation: Dashboard, Assets, Add Asset, Profile/Account,
    Sign Out.

-   Asset list should show key information at a glance: name, category,
    status, updated date, and optional thumbnail.

-   Forms must provide field-level validation errors and preserve
    previously entered values after validation failure.

-   Delete actions must require confirmation.

-   Empty states should explain what the user can do next, e.g. "No
    assets yet - add your first asset."

-   UI quality should be clean and consistent rather than visually
    elaborate.

# 7. Technical Architecture

## 7.1 Suggested High-Level Architecture

Browser -\> HTTPS -\> Laravel Web Application

Laravel -\> PostgreSQL

Laravel -\> File Storage abstraction -\> Local disk (development) /
Object storage (production)

Laravel -\> REST API endpoints under /api/v1

GitHub -\> CI pipeline -\> tests / static checks -\> cloud deployment
process

# 8. Data Model - Suggested MVP

Exact column names may change during implementation, but the following
conceptual model should be preserved.

## 8.1 Data Rules

-   Every asset must reference exactly one owner, one category and one
    status.

-   Deleting a user should not leave orphan assets.

-   Deleting an asset should not leave orphan attachment records or
    active share links.

-   Use database foreign keys where appropriate.

-   Use indexes on foreign keys and common search/filter fields.

-   Use decimal/numeric type for monetary values rather than floating
    point.

-   Timestamps should be stored consistently; prefer UTC at persistence
    boundaries.

# 9. REST API Requirements

The API exists primarily to demonstrate backend design skills. The web
UI may use traditional Laravel controllers independently; the API should
expose clean JSON resources.

## 9.1 API Standards

-   Use JSON request/response bodies where applicable.

-   Return meaningful HTTP status codes: 200/201/204, 400/422, 401, 403,
    404 and 500 as appropriate.

-   Do not leak stack traces or sensitive database information in
    production responses.

-   Validate all incoming data at the application boundary.

-   Use Laravel API Resources or equivalent consistent response
    formatting.

-   Version API routes under /api/v1.

-   Document example requests and responses in the repository README or
    separate API documentation.

# 10. Security Requirements

-   All protected web pages and API operations require authentication.

-   Authorisation must be enforced server-side for every asset,
    attachment and share-link operation.

-   Use Laravel CSRF protection for state-changing web form requests.

-   Never trust client-supplied user_id/owner values; derive ownership
    from the authenticated user.

-   Validate and sanitise input using Laravel validation mechanisms.

-   Validate uploaded files by size and allowed MIME/type rules.

-   Do not store secrets, API keys or database passwords in Git.

-   Use environment variables and provide a safe .env.example.

-   Production must use HTTPS.

-   Public share tokens must be sufficiently random and non-enumerable.

-   Shared pages must be read-only and must not expose owner email or
    other private account data by default.

-   Logs must not contain passwords, secrets or sensitive uploaded
    content.

# 11. Non-Functional Requirements

# 12. Testing Requirements

Testing is part of the portfolio value and must not be left until the
end.

-   Use PHPUnit/Pest according to the chosen Laravel setup.

-   Prefer feature tests for end-to-end HTTP behaviour and unit tests
    only where isolated business logic justifies them.

-   Use factories and seeders for repeatable test data.

-   CI must run the automated test suite on pull requests and/or pushes
    to main.

# 13. GitHub and Development Workflow

-   Create one public or private GitHub repository for the project.

-   Protect the main branch from direct experimental work; develop in
    short feature branches.

-   Use meaningful commit messages that describe the change rather than
    "update" or "fix".

-   Use pull requests even when working alone for meaningful features;
    this creates a visible engineering history.

-   Keep generated secrets, vendor directories and environment-specific
    data out of Git.

-   Track major work items using GitHub Issues or a simple project
    board.

-   Tag the first deployed portfolio release as v1.0.0.

## 13.1 Minimum CI Pipeline

1.  Install PHP/Composer dependencies.

2.  Prepare test environment and database.

3.  Run database migrations.

4.  Run automated tests.

5.  Run a formatter/linter/static analysis check if adopted by the
    project.

6.  Fail the workflow when any required check fails.

# 14. Local Development and Docker

-   The project must be runnable locally from a fresh clone using
    documented steps.

-   Use Docker Compose for at least the Laravel application and
    PostgreSQL database; optional supporting services may be added only
    when required.

-   Persistent PostgreSQL data should use a Docker volume for normal
    local development.

-   Provide commands for build/start/stop, migrations, seed data, tests
    and shell access.

-   Avoid unnecessary infrastructure such as Kubernetes for this
    project.

# 15. Cloud Deployment

Choose one cloud provider for the MVP. AWS is a natural choice for
portfolio visibility, but Azure is equally acceptable. The important
learning objective is deploying and operating the application, not
comparing clouds.

# 16. Implementation Plan - Build in This Order

# 17. Claude Project Working Method

Upload this specification to the Claude Project and treat it as the
baseline requirements document. Add the repository/codebase to the
project context using the supported Claude workflow available to the
developer. Keep the context current when major structural changes occur.

## 17.1 Recommended Instruction to Give Claude

## 17.2 Rules for AI-Assisted Development

-   Ask Claude to inspect existing code before proposing changes.

-   Implement one bounded requirement or phase at a time.

-   Require Claude to explain why a framework feature or package is
    being used.

-   Prefer built-in Laravel capabilities before adding third-party
    packages.

-   Do not accept code that the developer cannot explain at a high
    level.

-   Run generated migrations, tests and application flows locally after
    each material change.

-   Commit only after the change works and the developer understands it.

-   When Claude suggests changing architecture or requirements, record
    the decision before implementing it.

-   Ask Claude to identify security, data-loss and
    backward-compatibility risks before destructive changes.

-   Use Claude for code review, test ideas, debugging and
    documentation - not just code generation.

## 17.3 Suggested Prompt Pattern for Each Phase

1.  State the phase and requirement IDs being implemented.

2.  Ask Claude to inspect the current repository state.

3.  Ask for a short implementation plan before code changes.

4.  Implement the smallest coherent increment.

5.  Run migrations/tests and manually verify the flow.

6.  Ask Claude to review the implementation against this specification.

7.  Fix issues, then commit with a meaningful message.

8.  Only then proceed to the next requirement/phase.

# 18. Explicitly Out of Scope for MVP

-   Native mobile applications.

-   Multiple organisations/tenants.

-   Complex RBAC/administrator portal.

-   Direct posting through Facebook, Instagram or X APIs.

-   NoSQL as the primary database.

-   Microservices architecture.

-   Kubernetes.

-   Event-driven architecture unless a later feature clearly requires
    it.

-   AI-generated valuations or asset recognition.

-   Payment/subscription features.

-   Real-time collaboration.

-   Complex reporting/business intelligence.

-   Supporting both AWS and Azure in the same MVP.

# 19. Candidate Enhancements After v1.0

-   Google SSO using Laravel-supported OAuth tooling.

-   User-defined categories.

-   Typed custom fields and category templates.

-   Share-link expiry dates/password protection.

-   Background image processing and thumbnails.

-   Email notifications or share-by-email workflow.

-   Audit history for important changes.

-   Soft deletes and restore capability.

-   Import/export CSV.

-   Optional experiment using a NoSQL store for a clearly justified
    secondary use case.

-   Direct social integrations only if platform APIs and permissions
    justify the effort.

# 20. MVP Definition of Done

-   A new user can register, sign in and sign out.

-   Authenticated users can create, view, edit and delete only their own
    assets.

-   Every asset has a mandatory category and status.

-   Assets support flexible custom fields.

-   Assets support image/file attachments.

-   Dashboard and asset list support useful management, search and
    filters.

-   User can generate and revoke a secure public read-only asset-summary
    link.

-   REST API exposes the documented asset operations.

-   Core flows are covered by automated tests, including authorisation
    boundaries.

-   Application runs locally using Docker and PostgreSQL from documented
    instructions.

-   GitHub CI runs tests successfully.

-   Repository contains a useful README, .env.example and architecture
    overview.

-   Application is deployed to one cloud provider using production
    PostgreSQL and object storage or a documented equivalent.

-   A custom domain resolves to the application over HTTPS.

-   No secrets are committed to Git.

-   The developer can explain the architecture, database model,
    authentication, authorisation, REST API, Docker setup, tests and
    deployment decisions without relying on AI.

# 21. Final GitHub Portfolio Checklist

# 22. End-to-End Acceptance Scenario

1.  A new user registers and signs in.

2.  The user adds a "Living Room TV" asset under Electronics with status
    Active.

3.  The user adds custom fields such as Brand = Sony, Model = XR55,
    Screen Size = 55 inch.

4.  The user uploads a receipt image and warranty PDF.

5.  The user adds a second asset, "Family House", under Property with
    different custom fields such as Address, Bedrooms and Land Size.

6.  The dashboard shows both assets.

7.  The user searches for the TV and filters assets by category/status.

8.  The user edits the TV status or other details.

9.  The user generates a public share link for the TV summary and opens
    it in a logged-out/private browser window.

10. The shared page is read-only and does not expose account-private
    information.

11. The user revokes the link and verifies it no longer works.

12. Equivalent core CRUD operations can be demonstrated through the REST
    API.

13. Automated tests pass locally and in GitHub CI.

14. The same application is reachable under the production HTTPS domain.

  -----------------------------------------------------------------------
  Purpose of this document`<br>`{=html}This specification is the single
  source of truth for the project. It is intentionally detailed enough to
  be uploaded into a Claude Project and used as persistent context while
  the application is implemented incrementally. Claude may propose
  implementation details, but it should not change product requirements
  without an explicit decision from the developer/product manager.
  -----------------------------------------------------------------------

  -----------------------------------------------------------------------

  -----------------------------------------------------------------------
  Primary engineering goal`<br>`{=html}Build one polished,
  understandable, deployed application that demonstrates backend
  engineering proficiency. Completion, maintainability and explainability
  are more important than adding many advanced features.
  -----------------------------------------------------------------------

  -----------------------------------------------------------------------

  -----------------------------------------------------------------------
  Release                 Purpose                 Included
  ----------------------- ----------------------- -----------------------
  MVP / v1.0              Portfolio-ready first   Email/password auth,
                          release                 dashboard, CRUD assets,
                                                  categories/status,
                                                  custom fields,
                                                  attachments,
                                                  search/filter, secure
                                                  share link, REST API,
                                                  tests, Docker, GitHub
                                                  CI, cloud deployment

  v1.1                    Usability improvements  Google SSO, richer
                                                  dashboard statistics,
                                                  improved sharing
                                                  experience, additional
                                                  validation and polish

  v2.0                    Advanced learning       Direct social
                                                  integrations,
                                                  notifications, audit
                                                  history, background
                                                  jobs, optional NoSQL
                                                  experiment, advanced
                                                  search/analytics
  -----------------------------------------------------------------------

  -------------------------------------------------------------------------
  ID                Requirement         Priority          Acceptance
                                                          Criteria
  ----------------- ------------------- ----------------- -----------------
  FR-AUTH-01        A new user can      Must              Valid input
                    register with name,                   creates an
                    email address and                     account;
                    password.                             duplicate email
                                                          addresses are
                                                          rejected.

  FR-AUTH-02        A registered user   Must              Valid credentials
                    can sign in with                      create an
                    email and password.                   authenticated
                                                          session; invalid
                                                          credentials show
                                                          a safe generic
                                                          error.

  FR-AUTH-03        A signed-in user    Must              Session is
                    can sign out.                         invalidated and
                                                          protected pages
                                                          are no longer
                                                          accessible.

  FR-AUTH-04        Passwords must be   Must              Plain-text
                    stored using                          passwords never
                    Laravel-supported                     appear in
                    secure hashing.                       database or logs.

  FR-AUTH-05        Password reset      Should            User can request
                    through email may                     reset and use a
                    be implemented if                     time-limited
                    time permits.                         token.

  FR-AUTH-06        Google SSO is       Later             Not required for
                    deferred to v1.1.                     MVP completion.
  -------------------------------------------------------------------------

  -------------------------------------------------------------------------
  ID                Requirement         Priority          Acceptance
                                                          Criteria
  ----------------- ------------------- ----------------- -----------------
  FR-DASH-01        After sign-in, the  Must              Dashboard loads
                    user lands on a                       only the
                    dashboard.                            authenticated
                                                          user's data.

  FR-DASH-02        Dashboard displays  Must              Counts and list
                    total asset count                     match database
                    and recent assets.                    records owned by
                                                          the user.

  FR-DASH-03        Dashboard provides  Must              User can navigate
                    prominent actions                     without knowing
                    to add an asset and                   URLs.
                    browse assets.                        

  FR-DASH-04        Additional          Could             Do not block MVP
                    charts/statistics                     completion.
                    are optional for                      
                    v1.0.                                 
  -------------------------------------------------------------------------

  --------------------------------------------------------------------------
  ID                Requirement       Priority          Acceptance Criteria
  ----------------- ----------------- ----------------- --------------------
  FR-ASSET-01       User can create   Must              Created asset is
                    multiple assets.                    persisted and
                                                        associated with
                                                        current user.

  FR-ASSET-02       Each asset must   Must              Blank name is
                    have a                              rejected.
                    name/title.                         

  FR-ASSET-03       Each asset must   Must              Category is required
                    have a category.                    and valid.

  FR-ASSET-04       Each asset must   Must              Status is required
                    have a status.                      and valid.

  FR-ASSET-05       Asset may have    Should            Fields persist when
                    optional                            supplied.
                    description,                        
                    purchase date,                      
                    purchase price                      
                    and notes.                          

  FR-ASSET-06       User can view     Must              Page shows common
                    full asset                          fields, custom
                    detail.                             fields and
                                                        attachments.

  FR-ASSET-07       User can edit an  Must              Updated values are
                    owned asset.                        persisted.

  FR-ASSET-08       User can delete   Must              Asset becomes
                    an owned asset                      unavailable; related
                    after                               attachments/custom
                    confirmation.                       data are handled
                                                        safely.

  FR-ASSET-09       A user can never  Must              Authorisation is
                    view or modify                      enforced
                    another user's                      server-side.
                    asset.                              
  --------------------------------------------------------------------------

  ------------------------------------------------------------------------------
  ID                Requirement              Priority          Acceptance
                                                               Criteria
  ----------------- ------------------------ ----------------- -----------------
  FR-CUSTOM-01      User can add one or more Must              Each field has a
                    custom fields while                        label/name and
                    creating or editing an                     value.
                    asset.                                     

  FR-CUSTOM-02      Custom fields are        Must              All saved fields
                    displayed on asset                         render correctly.
                    detail pages.                              

  FR-CUSTOM-03      Custom fields can be     Must              Edits are
                    changed or removed.                        persisted without
                                                               damaging other
                                                               asset data.

  FR-CUSTOM-04      MVP may store custom     Design            Implementation
                    fields in PostgreSQL                       remains simple
                    JSONB.                                     while
                                                               demonstrating
                                                               PostgreSQL
                                                               capabilities.

  FR-CUSTOM-05      Typed custom fields      Later             MVP may treat
                    (date/number/dropdown)                     custom values as
                    are deferred.                              strings.
  ------------------------------------------------------------------------------

  ---------------------------------------------------------------------------------
  ID                Requirement       Priority          Acceptance Criteria
  ----------------- ----------------- ----------------- ---------------------------
  FR-FILE-01        User can upload   Must              Attachment metadata is
                    one or more                         linked to the asset.
                    files/images to                     
                    an owned asset.                     

  FR-FILE-02        Application       Must              Disallowed files are
                    validates file                      rejected with a clear
                    size and allowed                    message.
                    file types.                         

  FR-FILE-03        User can          Must              Only owner or valid
                    view/download an                    share-link viewer can
                    authorised                          access it as designed.
                    attachment.                         

  FR-FILE-04        User can delete   Must              Database reference and
                    an attachment.                      stored object are cleaned
                                                        up.

  FR-FILE-05        Local development Must              Storage implementation is
                    may use Laravel                     environment-configurable.
                    local storage;                      
                    cloud deployment                    
                    should use object                   
                    storage.                            
  ---------------------------------------------------------------------------------

  -----------------------------------------------------------------------
  ID                Requirement       Priority          Acceptance
                                                        Criteria
  ----------------- ----------------- ----------------- -----------------
  FR-SEARCH-01      User can search   Must              Results only
                    assets by                           include owned
                    name/title.                         assets matching
                                                        query.

  FR-SEARCH-02      User can filter   Must              Only selected
                    by category.                        category is
                                                        shown.

  FR-SEARCH-03      User can filter   Must              Only selected
                    by status.                          status is shown.

  FR-SEARCH-04      Asset list should Should            Pagination works
                    support                             without losing
                    pagination when                     filters.
                    record count                        
                    grows.                              
  -----------------------------------------------------------------------

  ------------------------------------------------------------------------------------
  ID                Requirement       Priority          Acceptance Criteria
  ----------------- ----------------- ----------------- ------------------------------
  FR-SHARE-01       User can generate Must              A unique non-guessable
                    a shareable                         token/identifier is generated.
                    read-only link                      
                    for an asset.                       

  FR-SHARE-02       Shared view       Must              Private/internal fields are
                    displays only the                   not exposed accidentally.
                    fields                              
                    intentionally                       
                    included in the                     
                    summary.                            

  FR-SHARE-03       User can revoke a Must              Revoked link no longer
                    share link.                         displays the asset.

  FR-SHARE-04       User can copy the Must              No social platform API is
                    share URL and use                   required.
                    normal                              
                    browser/device                      
                    sharing.                            

  FR-SHARE-05       Application can   Should            Summary can be
                    generate a                          deterministic/template-based
                    concise                             in MVP; AI generation is not
                    human-readable                      required.
                    summary of an                       
                    asset from stored                   
                    fields.                             

  FR-SHARE-06       Email/social      Could             They must use the existing
                    deep-link buttons                   secure share URL.
                    may be added as                     
                    UI conveniences.                    
  ------------------------------------------------------------------------------------

  -----------------------------------------------------------------------
  Layer                   MVP Choice              Notes
  ----------------------- ----------------------- -----------------------
  Language                PHP                     Use a current supported
                                                  PHP version compatible
                                                  with chosen Laravel
                                                  version.

  Dependency manager      Composer                All PHP dependencies
                                                  managed through
                                                  composer.json /
                                                  composer.lock.

  Framework               Laravel                 Use framework
                                                  conventions rather than
                                                  custom infrastructure
                                                  where possible.

  Frontend                Blade + minimal         Avoid adding React/Vue
                          JavaScript              unless needed after
                                                  MVP.

  Database                PostgreSQL              Primary relational
                                                  database for all
                                                  application data.

  Flexible metadata       PostgreSQL JSONB        Recommended for
                                                  per-asset custom fields
                                                  in MVP.

  API                     Laravel REST API        JSON endpoints under
                                                  /api/v1.

  Authentication          Laravel session auth    Use Laravel-supported
                          for web; token auth for packages/mechanisms.
                          API if needed           

  File storage            Local in development;   Examples: AWS S3 or
                          cloud object storage in Azure Blob Storage.
                          production              

  Containers              Docker + Docker Compose App and PostgreSQL
                                                  should run locally with
                                                  documented commands.

  Source control          Git + GitHub            Main repository for
                                                  code, issues and CI
                                                  workflow.

  CI                      GitHub Actions          Run tests and quality
                                                  checks on push/PR.

  Cloud                   Choose one: AWS OR      Do not implement both
                          Azure                   for MVP.

  Domain/TLS              Custom domain + HTTPS   Complete after cloud
                                                  deployment is stable.
  -----------------------------------------------------------------------

  -----------------------------------------------------------------------
  Entity                  Important Fields        Relationships
  ----------------------- ----------------------- -----------------------
  users                   id, name, email,        User has many assets
                          password, timestamps    

  categories              id, name, slug,         Category has many
                          timestamps              assets

  statuses                id, name, slug,         Status has many assets
                          timestamps              

  assets                  id, user_id,            Belongs to
                          category_id, status_id, user/category/status;
                          name, description,      has many attachments
                          purchase_date,          and share links
                          purchase_price,         
                          custom_fields JSONB,    
                          timestamps              

  attachments             id, asset_id,           Belongs to asset
                          original_name,          
                          storage_path,           
                          mime_type, size,        
                          timestamps              

  share_links             id, asset_id, token,    Belongs to asset
                          is_active, expires_at   
                          nullable, timestamps    
  -----------------------------------------------------------------------

  ------------------------------------------------------------------------------------------------
  Method                  Endpoint                                         Purpose
  ----------------------- ------------------------------------------------ -----------------------
  GET                     /api/v1/assets                                   List authenticated user
                                                                           assets with
                                                                           pagination/filtering

  POST                    /api/v1/assets                                   Create asset

  GET                     /api/v1/assets/{id}                              Get one owned asset

  PUT/PATCH               /api/v1/assets/{id}                              Update owned asset

  DELETE                  /api/v1/assets/{id}                              Delete owned asset

  POST                    /api/v1/assets/{id}/attachments                  Upload attachment

  DELETE                  /api/v1/assets/{id}/attachments/{attachmentId}   Delete attachment

  POST                    /api/v1/assets/{id}/share-links                  Create share link

  DELETE                  /api/v1/assets/{id}/share-links/{shareLinkId}    Revoke share link

  GET                     /api/v1/categories                               List available
                                                                           categories

  GET                     /api/v1/statuses                                 List available statuses
  ------------------------------------------------------------------------------------------------

  -----------------------------------------------------------------------
  Area                                Requirement
  ----------------------------------- -----------------------------------
  Maintainability                     Follow Laravel conventions; keep
                                      controllers reasonably small; move
                                      reusable business logic into
                                      appropriate services/actions only
                                      when complexity warrants it.

  Readability                         Code should be understandable by
                                      another junior/mid-level PHP
                                      developer without excessive
                                      abstraction.

  Performance                         Typical dashboard/list/detail
                                      requests should feel responsive for
                                      a personal portfolio workload.
                                      Avoid obvious N+1 queries.

  Reliability                         Validation errors should not
                                      corrupt data. Database operations
                                      involving multiple dependent
                                      changes should use transactions
                                      where appropriate.

  Accessibility                       Use semantic HTML, labels for form
                                      controls, keyboard-accessible
                                      actions and reasonable colour
                                      contrast.

  Observability                       Application logs should provide
                                      enough information to troubleshoot
                                      errors without exposing secrets.

  Portability                         Local development environment
                                      should start predictably using
                                      documented Docker commands.
  -----------------------------------------------------------------------

  -----------------------------------------------------------------------
  Test Area                           Minimum Coverage
  ----------------------------------- -----------------------------------
  Authentication                      Registration, login, logout,
                                      invalid login, protected-route
                                      access

  Authorisation                       User cannot read/update/delete
                                      another user's asset

  Asset CRUD                          Create, view, update, delete and
                                      validation failures

  Custom fields                       Persist, update and remove custom
                                      data

  Search/filter                       Name search, category filter and
                                      status filter

  Attachments                         Allowed upload, rejected file,
                                      deletion, ownership checks

  Sharing                             Create link, public view, revoke
                                      link, invalid/revoked token

  API                                 Happy paths, validation errors,
                                      authentication/authorisation, 404
                                      behaviour
  -----------------------------------------------------------------------

  -----------------------------------------------------------------------
  Capability                          Requirement
  ----------------------------------- -----------------------------------
  Application hosting                 Deploy the Laravel application
                                      using a manageable
                                      service/VM/container approach
                                      appropriate to the developer's
                                      learning level.

  Database                            Use a managed PostgreSQL service if
                                      practical; otherwise document the
                                      chosen secure deployment approach.

  Object storage                      Use S3-compatible/AWS S3 or Azure
                                      Blob for production attachments.

  Configuration                       Production secrets provided
                                      securely through
                                      environment/configuration
                                      management, never committed to Git.

  Domain                              Map a purchased domain/subdomain to
                                      the deployed application.

  TLS                                 Serve the production application
                                      over HTTPS.

  Deployment                          Document repeatable deployment
                                      steps. Automated deployment is
                                      desirable but not required for the
                                      first successful release.
  -----------------------------------------------------------------------

  -----------------------------------------------------------------------
  Important`<br>`{=html}Claude should assist with one phase at a time.
  The developer should run, test, read and understand each phase before
  asking Claude to continue. Do not ask Claude to generate the entire
  application in one prompt.
  -----------------------------------------------------------------------

  -----------------------------------------------------------------------

  --------------------------------------------------------------------------
  Phase                   Scope                      Exit Criterion
  ----------------------- -------------------------- -----------------------
  Phase 0 - Project Setup Create repository, Laravel A fresh clone can start
                          app, Composer baseline,    the application and
                          Docker Compose, PostgreSQL connect to PostgreSQL.
                          connection, .env.example,  
                          README start, CI skeleton. 

  Phase 1 -               Registration, login,       A user can securely
  Authentication          logout, protected routes,  create an account and
                          basic account page,        access only
                          authentication tests.      authenticated pages.

  Phase 2 - Core Asset    Migrations/models for      A user can manage their
  Model                   categories, statuses and   own basic assets;
                          assets; seed reference     cross-user access is
                          data; asset                blocked and tested.
                          create/view/edit/delete;   
                          policies/authorisation.    

  Phase 3 - Custom Fields Add JSONB custom_fields;   TV and house examples
                          UI for adding/removing     can each store
                          key/value pairs;           different fields
                          validation and tests.      without schema changes.

  Phase 4 - Dashboard,    Dashboard counts/recent    User can efficiently
  Search & Filters        items; asset list; name    find and manage assets.
                          search; category/status    
                          filters; pagination.       

  Phase 5 - Attachments   Local upload first;        Images/files can be
                          validation; asset          safely attached to
                          attachment UI;             owned assets.
                          delete/download; tests;    
                          storage abstraction.       

  Phase 6 - Sharing       Share-link model/token;    User can send a secure
                          public read-only summary;  link that works until
                          revoke; safe field         revoked.
                          exposure; tests.           

  Phase 7 - REST API      /api/v1 endpoints, API     CRUD and supporting
                          resources, validation,     asset operations are
                          auth approach, API tests,  available as documented
                          examples/documentation.    JSON API.

  Phase 8 - Quality &     Refactor only where        Project is
  Polish                  needed; accessibility      understandable and
                          pass; error states;        demo-ready locally.
                          README; architecture       
                          diagram; test coverage     
                          review.                    

  Phase 9 - Cloud         Choose AWS or Azure;       A real URL serves the
  Deployment              production                 working v1.0
                          database/storage; HTTPS;   application.
                          domain; production         
                          configuration; smoke test. 

  Phase 10 - Portfolio    Tag v1.0.0;                Recruiter/interviewer
  Packaging               screenshots/demo; final    can understand the
                          README; concise            project in a few
                          architecture/technology    minutes.
                          explanation and lessons    
                          learned.                   
  --------------------------------------------------------------------------

  -----------------------------------------------------------------------
  Suggested Claude Project instruction`<br>`{=html}Act as a senior
  PHP/Laravel engineering mentor and pair programmer. This project
  specification is the source of truth. Help me implement one phase at a
  time. Before writing code, inspect the existing codebase and explain
  the proposed change, files affected, data-model impact, security
  considerations and tests. Prefer Laravel conventions and simple
  maintainable solutions. Do not add technologies or major abstractions
  that are not required by the specification without explaining the
  trade-off and asking me to decide. After implementation, give me
  commands to run, tests to execute, expected results, and a short
  explanation of the code so I can understand and defend it in an
  interview.
  -----------------------------------------------------------------------

  -----------------------------------------------------------------------

  -----------------------------------------------------------------------
  Item                                Expected Evidence
  ----------------------------------- -----------------------------------
  README                              Problem statement, feature list,
                                      screenshots, architecture, local
                                      setup, test commands, API overview,
                                      deployment URL

  Repository history                  Clear commits and feature
                                      branches/PRs

  Tests                               Automated suite visible in
                                      repository and passing in CI

  Docker                              Dockerfile/Compose and reproducible
                                      setup instructions

  Database                            Migrations, factories/seeders and
                                      documented schema

  API                                 Documented endpoints and sample
                                      requests/responses

  Cloud                               Working deployment under HTTPS and
                                      custom domain

  Release                             Tagged v1.0.0 release

  Engineering explanation             Short architecture diagram and
                                      rationale for important technical
                                      choices
  -----------------------------------------------------------------------

  -----------------------------------------------------------------------
  Final scope guardrail`<br>`{=html}If a new feature does not materially
  improve the MVP learning objectives or portfolio demonstration, defer
  it until after v1.0. A finished, tested and deployed application is
  more valuable than an unfinished application with more features.
  -----------------------------------------------------------------------

  -----------------------------------------------------------------------
