# EAP - Architecture Specification and Prototype

Designed to enhance the gamer life experience, RNG allows the gaming community to share reviews, comments and news about their favorite or upcoming games in an easier way.

## A7: Web Resources Documentation

The architecture of the web application to develop is documented by indicating the catalogue of resources and the properties of each resource, which includes: references to the graphical interfaces, and the format of JSON responses. This document catalogues the resources used by *RNG*, including all operations over data: create, read, update, and delete.

This specification adheres to the OpenAPI standard using YAML.

### 1. Overview

| Identifier                                 | Description                                                  |
| ------------------------------------------ | ------------------------------------------------------------ |
| M01: Authentication and Individual Profile | Web resources associated with User Authentication and profile management, which includes the following system features: login/logout, registration, credential recovery, viewing and editing profile information. |
| M02: Threads                               | Web resources associated with viewing Threads, which includes the following system features: viewing a list of all a Member's Threads, viewing Top/Recent Threads, Top/Recent News, Top/Recent Reviews and its respective comments. |
| M03: Thread Management                     | Web resources associated with the management of threads, which includes the following system features: create, delete and edit a Thread. Furthermore, it also includes voting on Threads. |
| M04: Comments                              | Web resources associated with Comments, which includes the following system features: commenting on Threads, replying to Comments, editing/deleting Comments and reporting other Member's Comments. |
| M05: Friends                               | Web resources associated to Friends and Friends List, which includes the following system features: sending Friend Requests, remove Members from the Friends List, viewing the Friends List/pending Friend Requests. |
| M06: Search                                | Web resources associated with searching for Posts on the platform, which includes the following system features: searching for Users/Threads. |
| M07: Administrator and Static Pages        | Web resources associated with User management and Administration Information, which includes the following system features: viewing the developers Team,  viewing the FAQ (*Frequently Asked Questions*), banning/unbanning Member's, awarding Administrator privileges, viewing the list of reported Members and viewing a Member's Top Posts. |



### 2. Permissions

| Identifier | Name          | Description                                                  |
| ---------- | ------------- | ------------------------------------------------------------ |
| PUB        | Public        | Users without privileges                                     |
| USR        | User          | Authenticated users                                          |
| OWN        | Owner         | Users that are owners of the information (e.g. own profile, own Threads) |
| ADM        | Administrator | Administrators                                               |



### 3. OpenAPI Specification

This section includes the complete API specification in OpenAPI (YAML).

The link to the group's OpenAPI YAML can be found [here](https://git.fe.up.pt/lbaw/lbaw2021/lbaw2143/-/blob/master/api/rng-api.yaml).

For easier navigation, the link to the group's SwaggerHub generated documentation can be found [here](https://app.swaggerhub.com/apis-docs/lbaw2143/LBAW/1.0).

```yaml
openapi: 3.0.0

info:
  version: '1.0'
  title: 'LBAW RNG Web API'
  description: 'Web Resources Specification (A7) for RNG'
  contact:
    email: 'up201806329@edu.up.pt'

servers:
  # Added by API Auto Mocking Plugin
  - description: SwaggerHub API Auto Mocking
    url: https://virtserver.swaggerhub.com/lbaw2143/LBAW/1.0
  - url: http://lbaw2143.lbaw-prod.fe.up.pt/
    description: Production server

tags:
  - name: 'M01: Authentication and Individual Profile'
  - name: 'M02: Threads'
  - name: 'M03: Thread Management'
  - name: 'M04: Comments'
  - name: 'M05: Friends'
  - name: 'M06: Search'
  - name: 'M07: Administrator and Static Pages'

paths:
  /login:
    get:
      operationId: R101
      summary: 'R101: Login Form'
      description: 'Provide login form. Access: PUB'
      tags:
        - 'M01: Authentication and Individual Profile'
      responses:
        '200':
          description: 'Ok. Show [UI06](https://git.fe.up.pt/lbaw/lbaw2021/lbaw2143/-/wikis/er#ui06-log-in)'
    post:
      operationId: R102
      summary: 'R102: Login Action'
      description: 'Processes the login form submission. Access: PUB'
      tags:
        - 'M01: Authentication and Individual Profile'
      requestBody:
        required: true
        content:
          application/x-www-form-urlencoded:
            schema:
              type: object
              properties:
                username:
                  type: string
                password:
                  type: string
              required:
                - username
                - password
      responses:
        '302':
          description: 'Redirect after processing the login credentials.'
          headers:
            Location:
              schema:
                type: string
              examples:
                302Success:
                  description: 'Successful authentication. Redirect to main page.'
                  value: '/home'
                302Error:
                  description: 'Failed authentication.'
                  value: '/login'
        '400':
          description: 'Bad Request'
  /logout:
    post:
      operationId: R103
      summary: 'R103: Logout Action'
      description: 'Logout the current authenticated used. Access: USR'
      tags:
        - 'M01: Authentication and Individual Profile'
      responses:
        '302':
          description: 'Redirect after processing logout.'
          headers:
            Location:
              schema:
                type: string
              examples:
                302Success:
                  description: 'Successful logout. Redirect to home page.'
                  value: '/home'
        '400':
          description: 'Bad Request'

  /register:
    get:
      operationId: R104
      summary: 'R104: Register Form'
      description: 'Provide new user registration form. Access: PUB'
      tags:
        - 'M01: Authentication and Individual Profile'
      responses:
        '200':
          description: 'Ok. Show [UI08](https://git.fe.up.pt/lbaw/lbaw2021/lbaw2143/-/wikis/er#ui08-sign-up)'
        '400':
          description: 'Bad Request'
    
    post:
      operationId: R105
      summary: 'R105: Register Action'
      description: 'Processes the new user registration form submission. Access: PUB'
      tags:
        - 'M01: Authentication and Individual Profile'

      requestBody:
        required: true
        content:
          application/x-www-form-urlencoded:
            schema:
              type: object
              properties:
                username:
                  type: string
                email:
                  type: string
                password:
                  type: string
                confirm_password:
                  type: string
              required:
                - username
                - email
                - password
                - confirm_password

      responses:
        '302':
          description: 'Redirect after processing the new user information.'
          headers:
            Location:
              schema:
                type: string
              examples:
                302Success:
                  description: 'Successful authentication. Redirect to user profile.'
                  value: '/users/{id}'
                302Failure:
                  description: 'Failed authentication. Redirect to sign up form.'
                  value: '/register'
        '400':
          description: 'Bad Request'

  /reset:
    get:
      operationId: R106
      summary: 'R106: Recover Password Form'
      description: 'Provide recover password form. Access: PUB'
      tags:
        - 'M01: Authentication and Individual Profile'
      responses:
        '200':
          description: 'Ok. Show [UI07](https://git.fe.up.pt/lbaw/lbaw2021/lbaw2143/-/wikis/er#ui07-recover-password)'
        '400':
          description: 'Bad Request'
    
    post:
      operationId: R107
      summary: 'R107: Recover Password Action'
      description: 'Processes the recover password form submission. Access: PUB'
      tags:
        - 'M01: Authentication and Individual Profile'

      requestBody:
        required: true
        content:
          application/x-www-form-urlencoded:
            schema:
              type: object
              properties:
                email:
                  type: string
              required:
                - email
            
      responses:
        '302':
          description: 'Redirect after processing the recover password information.'
          headers:
            Location:
              schema:
                type: string
              examples:
                302Success:
                  description: 'Successful authentication. Redirect to login page.'
                  value: '/home'
                302Failure:
                  description: 'Failed authentication. Redirect to recover password form.'
                  value: '/reset'
        '400':
          description: 'Bad Request'

  /users/{id}:
    get:
      operationId: R108
      summary: 'R108: Show Member''s Profile'
      description: 'Page that shows member information. Access: PUB'
      tags:
        - 'M01: Authentication and Individual Profile'
      parameters:
        - in: path
          name: id
          schema:
            type: integer
          description: 'Specifies the member id'
          required: true
      responses:
        '200':
          description: 'Ok. Show [UI15](https://git.fe.up.pt/lbaw/lbaw2021/lbaw2143/-/wikis/er#ui15-profile)'
        '400':
          description: 'Bad Request'
        '404':
          description: 'Member not found'
  
  /users/{id}/settings:
    get:
      operationId: R109
      summary: 'R109: Profile Settings'
      description: 'Page that allows a member to update his information and settings. Access: OWN'
      tags:
        - 'M01: Authentication and Individual Profile'
      parameters:
        - in: path
          name: id
          schema:
            type: integer
          description: 'Specifies the member id'
          required: true
      responses:
        '200':
          description: 'Ok. Show [UI19](https://git.fe.up.pt/lbaw/lbaw2021/lbaw2143/-/wikis/er#ui19-settings)'
        '400':
          description: 'Bad Request'
        '403':
          description: 'Forbidden access'
        '404':
          description: 'Member not found'

    put:
      operationId: R110
      summary: 'R110: Edit member information '
      description: 'Allows a member to edit his information. Access: OWN'
      tags:
        - 'M01: Authentication and Individual Profile'
      parameters:
        - in: path
          name: id
          schema:
            type: integer
          description: 'Specifies the member id'
          required: true
      requestBody:
        required: true
        content:
          application/x-www-form-urlencoded:
            schema:
              type: object
              properties:
                username:
                  type: string
                description:
                  type: string
                profile_image:
                  type: string
                  format: binary
                profile_header:
                  type: string
                  format: binary

      responses:
        '302':
          description: 'Redirect member after change information.'
          headers:
            Location:
              schema:
                type: string
              examples:
                302Success:
                  description: 'Member information edited successfully. Redirects member to their profile page.'
                  value: '/users/{id}'
                302Failure:
                  description: 'Member information editing failed. Stay in the settigns page.'
                  value: '/users/{id}/settings'
        '400':
          description: 'Bad Request'
        '403':
          description: 'Forbidden access'
        '404':
          description: 'Member not found'

  /api/users/{id}/change_email_address:
    put:
      operationId: R111
      summary: 'R111: Change members email address'
      description: 'Allows a member to change its email address. Access: OWN'
      tags:
        - 'M01: Authentication and Individual Profile'
      parameters:
        - in: path
          name: id
          schema:
            type: integer
          description: 'Specifies the member id'
          required: true
      requestBody:
        required: true
        content:
          application/x-www-form-urlencoded:
            schema:
              type: object
              properties:
                new_email:
                  type: string
                confirm_new_email:
                  type: string
              required:
                - new_email
                - confirm_new_email      
      responses:
        '200':
          description: 'Updated email address'
        '400':
          description: 'Bad Request'
        '403':
          description: 'Forbidden access'
        '404':
          description: 'Page not found'

  /api/users/{id}/change_password:
    put:
      operationId: R112
      summary: 'R112: Change members password'
      description: 'Allows a member to change its password. Access: OWN'
      tags:
        - 'M01: Authentication and Individual Profile'
      parameters:
        - in: path
          name: id
          schema:
            type: integer
          description: 'Specifies the member id'
          required: true
      requestBody:
        required: true
        content:
          application/x-www-form-urlencoded:
            schema:
              type: object
              properties:
                old_password:
                  type: string
                new_password:
                  type: string
                confirm_new_password:
                  type: string
              required:
                - old_password
                - new_password   
                - confirm_new_password   
      responses:
        '200':
          description: 'Updated password'
        '400':
          description: 'Bad Request'
        '403':
          description: 'Forbidden access'
        '404':
          description: 'Page not found'
  
  /users/{id}/delete:
    delete:
      operationId: R113
      summary: 'R113: Delete an account'
      description: 'Allows to delete a member account. Access OWN'
      tags:
        - 'M01: Authentication and Individual Profile'
      parameters:
        - in: path
          name: id
          schema:
            type: integer
          description: 'Specifies the member id'
          required: true
      responses:
        '302':
          description: 'Redirect member after after delete account.'
          headers:
            Location:
              schema:
                type: string
              examples:
                302Success:
                  description: 'Member deleted successfully. Redirect to member to homepage.'
                  value: '/home'
                302Failure:
                  description: 'Member deletion failed. Redirect to member to profile.'
                  value: '/users/{id}'
        '400':
          description: 'Bad Request'
        '403':
          description: 'Forbidden access'
        '404':
          description: 'Member not found'

  /users/{id}/friends:
    get:
      operationId: R501
      summary: 'R501: View Member''s Friends'
      description: 'Page where it is possible to see a Member''s friends. Access: PUB'
      tags:
        - 'M05: Friends'
      parameters:
        - in: path
          name: id
          schema:
            type: integer
          description: 'Specifies the member id'
          required: true
      responses:
        '200':
          description: 'Ok. Show [UI19](https://git.fe.up.pt/lbaw/lbaw2021/lbaw2143/-/wikis/er#ui16-friends-list)'
        '400':
          description: 'Bad Request'
        '404':
          description: 'Member not found'
    post:
      operationId: R502
      summary: 'R502: Send Friend Request to another Member'
      description: 'Allows a Member to send Friend Request to another Member. Access: USR'
      tags:
        - 'M05: Friends'
      parameters:
        - in: path
          name: id
          schema:
            type: integer
          description: 'Specifies the id of the member that will receive the Friend Request'
          required: true
      responses:
        '200':
          description: 'Friend Request sent successfully'
        '400':
          description: 'Bad Request'
        '404':
          description: 'Member not found'

  /api/users/{id}/friends/{idFriend}:
    delete:
      operationId: R503
      summary: 'R503: Remove Friends from Friends List'
      description: 'Allows a member to remove another member from Friends List. Access: USR'
      tags:
        - 'M05: Friends'
      parameters:
        - in: path
          name: id
          schema:
            type: integer
          required: true
        - in: path
          name: idFriend
          schema:
            type: integer
          required: true
          description: 'Specifies the id of the member that will be remove from Friends List'
      responses:
        '200':
          description: 'Member removed from Friends List successfully'
        '400':
          description: 'Bad Request'
        '404':
          description: 'Member not found'  
  
  /home:
    get:
      operationId: R201
      summary: 'R201: Shows Home Page'
      description: 'Obtains main page Top Categories. Access: PUB'
      tags:
        - 'M02: Threads'
      responses:
        '200':
          description: 'Ok. Show [UI01](https://git.fe.up.pt/lbaw/lbaw2021/lbaw2143/-/wikis/er#ui01-home)'
        '400':
          description: 'Bad Request'
        '404':
          description: 'Page not found'

  /top:
    get:
      operationId: R202
      summary: 'R202: Shows Top Threads'
      description: 'Shows Top Threads. Access: PUB'
      tags:
        - 'M02: Threads'
      responses:
        '200':
          description: 'Ok. Shows [UI01](https://git.fe.up.pt/lbaw/lbaw2021/lbaw2143/-/wikis/er#ui01-home)'
          content:
            application/json:
              schema:
                type: array
                items: 
                  $ref: '#/components/schemas/Thread_Preview'
        '400':
          description: 'Bad Request'
        '404':
          description: 'Page not found'

  /recent:
    get:
      operationId: R203
      summary: 'R203: Shows Recent Threads'
      description: 'Shows Recent Threads. Access: PUB'
      tags:
        - 'M02: Threads'
      responses:
        '200':
          description: 'Ok. Shows [UI01](https://git.fe.up.pt/lbaw/lbaw2021/lbaw2143/-/wikis/er#ui01-home)'
          content:
            application/json:
              schema:
                type: array
                items: 
                  $ref: '#/components/schemas/Thread_Preview'
        '400':
          description: 'Bad Request'
        '404':
          description: 'Page not found'

  /topnews:
    get:
      operationId: R204
      summary: 'R204: Shows Top News'
      description: 'Shows Top News. Access: PUB'
      tags:
        - 'M02: Threads'
      responses:
        '200':
          description: 'Ok. Shows [UI03](https://git.fe.up.pt/lbaw/lbaw2021/lbaw2143/-/wikis/er#ui03-news-tab)'
          content:
            application/json:
              schema:
                type: array
                items: 
                  $ref: '#/components/schemas/Thread_Preview'
        '400':
          description: 'Bad Request'
        '404':
          description: 'Page not found'

  /recentnews:
    get:
      operationId: R205
      summary: 'R205: Shows Recent News'
      description: 'Shows Recent News. Access: PUB'
      tags:
        - 'M02: Threads'
      responses:
        '200':
          description: 'Ok. Shows [UI03](https://git.fe.up.pt/lbaw/lbaw2021/lbaw2143/-/wikis/er#ui03-news-tab)'
          content:
            application/json:
              schema:
                type: array
                items: 
                  $ref: '#/components/schemas/Thread_Preview'
        '400':
          description: 'Bad Request'
        '404':
          description: 'Page not found'

  /topreviews:
    get:
      operationId: R206
      summary: 'R206: Shows Top Reviews'
      description: 'Shows Top Reviews. Access: PUB'
      tags:
        - 'M02: Threads'
      responses:
        '200':
          description: 'Ok. Shows [UI02](https://git.fe.up.pt/lbaw/lbaw2021/lbaw2143/-/wikis/er#ui02-reviews-tab)'
          content:
            application/json:
              schema:
                type: array
                items: 
                  $ref: '#/components/schemas/Thread_Preview'
        '400':
          description: 'Bad Request'
        '404':
          description: 'Page not found'


  /recentreviews:
    get:
      operationId: R207
      summary: 'R207: Shows Recent Reviews'
      description: 'Shows Recent Reviews. Access: PUB'
      tags:
        - 'M02: Threads'
      responses:
        '200':
          description: 'Ok. Shows [UI02](https://git.fe.up.pt/lbaw/lbaw2021/lbaw2143/-/wikis/er#ui02-reviews-tab)'
          content:
            application/json:
              schema:
                type: array
                items: 
                  $ref: '#/components/schemas/Thread_Preview'
        '400':
          description: 'Bad Request'
        '404':
          description: 'Page not found'

  /search_threads:
    get:
      operationId: R601
      summary: 'R601: Search Threads'
      description: 'Get Search Threads form and search results. Access: PUB'
      tags:
        - 'M06: Search'
      responses:
        '200':
          description: 'Ok. Shows [UI17](https://git.fe.up.pt/lbaw/lbaw2021/lbaw2143/-/wikis/er#ui17-search-for-posts)'
        '400':
          description: 'Bad Request'
        '404':
          description: 'Not found'

    post:
      operationId: R602
      summary: 'R602: Search Action'
      description: 'Processes the search thread form submission. Access: PUB'
      tags:
        - 'M06: Search'

      requestBody:
        required: true
        content:
          application/x-www-form-urlencoded:
            schema:
              type: object
              properties:
                categories:
                  type: array
                  items:
                    $ref: '#/components/schemas/Category'                  
                min_rating:
                  type: integer
                max_rating:
                  type: integer
                before_date:
                  type: integer
                after_date:
                  type: integer
                friends:
                  type: boolean
              required:
                - categories
                - min_rating
                - max_rating
                - before_date
                - after_date
                - friends

      responses:
        '302':
          description: 'Redirect after processing the search parameters.'
          headers:
            Location:
              schema:
                type: string
              examples:
                302Success:
                  description: 'Search succefully. Redirect to user profile.'
                  value: '/search_threads'
                302Failure:
                  description: 'Failed authentication. Redirect to sign up form.'
                  value: '/search_searchs'
        '400':
          description: 'Bad Request'

  /search_threads/news:
    get:
      operationId: R603
      summary: 'R603: Search News Threads'
      description: 'Get Search News Threads form and search results. Access: PUB'
      tags:
        - 'M06: Search'
      responses:
        '200':
          description: 'Ok. Shows [UI17](https://git.fe.up.pt/lbaw/lbaw2021/lbaw2143/-/wikis/er#ui17-search-for-posts)'
        '400':
          description: 'Bad Request'
        '404':
          description: 'Not found'

  /search_threads/reviews:
    get:
      operationId: R604
      summary: 'R604: Search Reviews Threads'
      description: 'Get Search Reviews Threads form and search results. Access: PUB'
      tags:
        - 'M06: Search'
      responses:
        '200':
          description: 'Ok. Shows [UI17](https://git.fe.up.pt/lbaw/lbaw2021/lbaw2143/-/wikis/er#ui17-search-for-posts)'
        '400':
          description: 'Bad Request'
        '404':
          description: 'Not found'
  
  /about:
    get:
      operationId: R701
      summary: 'R701: View About Us Page'
      description: 'Page that provides information about the platform and its developer team. Access: PUB'
      tags:
        - 'M07: Administrator and Static Pages'
      responses:
        '200':
          description: 'Ok. Show [UI04](https://git.fe.up.pt/lbaw/lbaw2021/lbaw2143/-/wikis/er#ui04-about)'
        '400':
          description: 'Bad Request'
        '404':
          description: 'Page not found'

  /faq:
    get:
      operationId: R702
      summary: 'R702: View Frequently Asked Questions Page'
      description: 'Page that provides answers to the most frequently asked questions by the community. Access: PUB'
      tags:
        - 'M07: Administrator and Static Pages'
      responses:
        '200':
          description: 'Ok. Show [UI05](https://git.fe.up.pt/lbaw/lbaw2021/lbaw2143/-/wikis/er#ui05-frequently-asked-questions)'
        '400':
          description: 'Bad Request'
        '404':
          description: 'Page not found'

  /create_thread:
    get:
      operationId: R301
      summary: 'R301: Shows Create Thread Page'
      description: 'Page that provides a form for a registered user to create his thread. Access: USR'
      tags:
        - 'M03: Thread Management'
      responses:
        '200':
          description: 'Ok. Show [UI09](https://git.fe.up.pt/lbaw/lbaw2021/lbaw2143/-/wikis/er#ui09-create-post)'
        '302':
          description: 'Redirect if not logged in.'
          headers:
            Location:
              schema:
                type: string
              examples:
                302Success:
                  description: 'Authentication confirmed.'
                302Error:
                  description: 'Unable to confirm authentication.'
                  value: '/login'
        '400':
          description: 'Bad Request'
        '404':
          description: 'Page not found'
    post:
      operationId: R302
      summary: 'R302: Create Thread Action'
      description: 'Processes the create Thread form submission. Access: USR'
      tags:
        - 'M03: Thread Management'
      requestBody:
        required: true
        content:
          application/x-www-form-urlencoded:
            schema:
              type: array
              items: 
                $ref: '#/components/schemas/Thread'
      responses:
        '302':
          description: 'Redirect after processing the Thread information.'
          headers:
            Location:
              schema:
                type: string
              examples:
                302Success:
                  description: 'Successfully processed Thread information.'
                  value: '/threads/{id}'
                302Error:
                  description: 'Information processing failed.'
                  value: '/create_thread'
        '400':
          description: 'Bad Request'

  /threads/{id}:
    get:
      operationId: R208
      summary: 'R208: Shows a Thread''s Page'
      description: 'Shows a new or review Thread and its comments. Access: PUB'
      tags:
        - 'M02: Threads'
      parameters:
        - in: path
          name: id
          schema:
            type: integer
          description: 'Specifies the id of the Thread to be displayed'
          required: true
      responses:
        '200':
          description: 'Ok. Show [UI11](https://git.fe.up.pt/lbaw/lbaw2021/lbaw2143/-/wikis/er#ui11-thread)'
        '400':
          description: 'Bad Request'
        '404':
          description: 'Thread not found'
    delete:
        operationId: R303
        summary: 'R303: Deletes a Thread'
        description: 'Allows a member to delete his Thread. Access OWN, ADM'
        tags: 
          - 'M03: Thread Management'
        parameters:
          - in: path
            name: id
            schema:
              type: integer
            description: 'Specifies the id of the Thread to be deleted'
            required: true
        responses:
          '302':
            description: 'Redirect to home page after deleting the Thread.'
            
  /threads/{id}/edit:
    get:
      operationId: R304
      summary: 'R304: Edit Thread Form'
      description: 'Page that allows a member to edit his Thread. Access: OWN'
      tags:
        - 'M03: Thread Management'
      parameters:
        - in: path
          name: id
          schema:
            type: integer
          description: 'Specifies the id of the Thread the owner that wants to edit it'
          required: true
      responses:
        '200':
          description: 'Ok. Shows [UI10](https://git.fe.up.pt/lbaw/lbaw2021/lbaw2143/-/wikis/er#ui10-edit-post)'
        '400':
          description: 'Bad Request'
        '403':
          description: 'Forbidden access'
        '404':
          description: 'Thread not found'
    put:
      operationId: R305
      summary: 'R305: Edit Thread Action'
      description: 'Allows a member to edit the content of his Thread. Access: OWN'
      tags: 
        - 'M03: Thread Management'
      parameters:
        - in: path
          name: id
          schema:
            type: integer
          description: 'Specifies the id of the Thread the owner wants to edit'
          required: true
      requestBody:
        required: true
        content:
          application/x-www-form-urlencoded:
            schema:
              type: object
              properties:
                title:
                  type: string
                summary:
                  type: string
                categories:
                  type: array
                  items:
                    $ref: '#/components/schemas/Category'
                description:
                  type: string
                date_time:
                  type: string
                  format: date-time
                owner_id:
                  type: integer
                username:
                  type: string
                images:
                  type: array
                  items: 
                    type: string
                    format: byte
      responses:
        '302':
          description: 'Redirect after updating the Thread content.'
          headers:
            Location:
              schema:
                type: string
              examples:
                302Success:
                  description: 'Thread information edited successfully. Redirects member to their Thread page.'
                  value: '/threads/{id}'
                302Failure:
                  description: 'Thread information editing failed. Stays in the Thread page.'
                  value: '/threads/{id}/edit'
        '400':
          description: 'Bad Request'
        '403':
          description: 'Forbidden access'
        '404':
          description: 'Member not found'

  /api/threads/{id}/vote:
    post:
      operationId: R306
      summary: 'R306: Rate a Thread'
      description: 'Allows a member to upvote/downvote a Thread. Access USR'
      parameters:
        - in: path
          name: id
          schema:
            type: integer
          description: 'Specifies the id of the Thread to be voted'
          required: true
      tags: 
        - 'M03: Thread Management'
      requestBody:
        required: true
        content:
          application/x-www-form-urlencoded:
            schema:
              $ref: '#/components/schemas/Vote'
      responses:
        '200':
          description: 'Vote successfully made'
          content:
            application/json:
              schema:
                type: object
                properties:
                  rating: 
                    type: integer
        '400':
          description: 'Bad Request'
        '404':
          description: 'Page not found'
        '403':
          description: 'Forbidden access'        
        '302':
          description: 'Redirect'
          headers:
            Location:
              schema:
                type: string
              examples:
                302Success:
                  description: 'Redirect to login form to be able to vote.'
                  value: '/login'
    
    put:
      operationId: R307
      summary: 'R307: Edit vote on a Thread'
      description: 'Allows a member to edit their vote on a Thread. Access: OWN'
      tags:
        - 'M03: Thread Management'
      parameters:
        - in: path
          name: id
          schema:
            type: integer
          required: true
          description: 'Specifies the id of the Thread where the vote is to be edited'
      requestBody:
        required: true
        content:
          application/x-www-form-urlencoded:
            schema:
              $ref: '#/components/schemas/Vote' 
      responses:
        '200':
          description: 'Vote edited successfully'
          content:
            application/json:
              schema:
                type: object
                properties:
                  rating: 
                    type: integer
        '400':
          description: 'Bad Request'
        '404':
          description: 'Comment not found'

    delete:
      operationId: R308
      summary: 'R308: Delete a vote'
      description: 'Allows a member to undo his upvote/downvote on a Thread. Access: USR'
      tags:
        - 'M03: Thread Management'
      parameters:
        - in: path
          name: id
          schema:
            type: integer
          description: 'Specifies the id of the Thread to undo the vote'
          required: true
      responses:
        '200':
          description: 'Vote removed from Thread'
          content:
            application/json:
              schema:
                type: object
                properties:
                  rating: 
                    type: integer
        '400':
          description: 'Bad Request'
        '404':
          description: 'Post not found'

  /api/threads/{id}/report:
    post:
      operationId: R309
      summary: 'R309: Report a Thread'
      description: 'Allows a member to report a Thread. Access: USR'
      tags: 
        - 'M03: Thread Management'
      parameters:
        - in: path
          name: id
          schema:
            type: integer
          description: 'Specifies the id of the Thread to be reported'
          required: true
      requestBody:
        required: true
        content:
          application/x-www-form-urlencoded:
            schema:
              $ref: '#/components/schemas/Report'
      responses: 
        '200':
          description: 'Report sent successfully'
        '400':
          description: 'Bad Request'
        '404':
          description: 'Page not found.'
    
    delete:
      operationId: R310
      summary: 'R310: Delete a report'
      description: 'Allows a member to undo his report on a Thread. Access: USR'
      tags:
        - 'M03: Thread Management'
      parameters:
        - in: path
          name: id
          schema:
            type: integer
          description: 'Specifies the id of the Thread to undo the report'
          required: true
      responses:
        '200':
          description: 'Report removed from Thread'
        '400':
          description: 'Bad Request'
        '404':
          description: 'Post not found'

  /api/threads/{id}/comment:
    post:
      operationId: R401
      summary: 'R401: Comment on a Thread'
      description: 'Allows a member to comment on a Thread. Access: USR'
      tags:
        - 'M04: Comments'
      parameters:
        - in: path
          name: id 
          schema:
            type: integer
          required: true
          description: 'Specifies the id of the thread to be commented'
      requestBody:
        required: true
        content:
          application/x-www-form-urlencoded:
            schema:
              $ref: '#/components/schemas/Comment'
      responses:
        '200':
          description: 'Comment created successfully'
          content:
            application/json:
              schema:
                type: array
                items: 
                  $ref: '#/components/schemas/Comment'
        '400':
          description: 'Bad Request'
        '404':
          description: 'Post not found'

  /api/comments/{id}/reply:
    post:
      operationId: R402
      summary: 'R402: Reply on a comment'
      description: 'Allows a member to reply on a comment. Access: USR'
      tags:
        - 'M04: Comments'
      parameters:
        - in: path
          name: id
          schema:
            type: integer
          required: true
          description: 'Specifies the id of the comment to be replied'
      requestBody:
        required: true
        content:
          application/x-www-form-urlencoded:
            schema:
              $ref: '#/components/schemas/Reply_Comment'     
      responses:
        '200':
          description: 'Reply created successfully'
          content:
            application/json:
              schema:
                type: object
                items: 
                  $ref: '#/components/schemas/Comment'
        '400':
          description: 'Bad Request'
        '404':
          description: 'Comment not found'
  /api/comments/{id}/edit:
    put:
      operationId: R403
      summary: 'R403: Edit a comment'
      description: 'Allows a member to edit his comment. Access: OWN'
      tags:
        - 'M04: Comments'
      parameters:
        - in: path
          name: id
          schema:
            type: integer
          required: true
          description: 'Specifies the id of the comment to be edited'
      requestBody:
        required: true
        content:
          application/x-www-form-urlencoded:
            schema:
              $ref: '#/components/schemas/Comment'     
      responses:
        '200':
          description: 'Comment edited successfully'
          content:
            application/json:
              schema:
                type: object
                items: 
                  $ref: '#/components/schemas/Comment'
        '400':
          description: 'Bad Request'
        '404':
          description: 'Comment not found'

  /api/comments/{id}/delete:
    delete:
      operationId: R404
      summary: 'R404: Delete a comment'
      description: 'Allows a member to delete a comment. Access: OWN, ADM'
      tags:
        - 'M04: Comments'
      parameters:
        - in: path
          name: id
          schema:
            type: integer
          required: true
          description: 'Specifies the id of the comment to be deleted'
      responses:
        '200':
          description: 'Comment deleted successfully'
          content:
            application/json:
              schema:
                type: object
                items: 
                  $ref: '#/components/schemas/Comment'
        '400':
          description: 'Bad Request'
        '404':
          description: 'Comment not found'
    
  /api/comments/{id}/report:
    post:
      operationId: R405
      summary: 'R405: Report a comment'
      description: 'Allows a member to report a comment. Access: USR'
      tags:
        - 'M04: Comments'
      parameters:
        - in: path
          name: id
          schema:
            type: integer
          required: true
          description: 'Specifies the id of the comment to be reported'
      requestBody:
        required: true
        content:
          application/x-www-form-urlencoded:
            schema:
              $ref: '#/components/schemas/Report'     
      responses:
        '200':
          description: 'Comment reported successfully'
        '400':
          description: 'Bad Request'
        '404':
          description: 'Comment not found'
    
    delete:
      operationId: R406
      summary: 'R406: Delete a report'
      description: 'Allows a member to undo his report on a Comment. Access: USR'
      tags:
        - 'M04: Comments'
      parameters:
        - in: path
          name: id
          schema:
            type: integer
          description: 'Specifies the id of the Report to undo the report'
          required: true
      responses:
        '200':
          description: 'Report removed from Comment'
        '400':
          description: 'Bad Request'
        '404':
          description: 'Post not found'

  /api/comments/{id}/vote:
    post:
      operationId: R407
      summary: 'R407: Vote on a comment'
      description: 'Allows a member to vote on a comment. Access: USR'
      tags:
        - 'M04: Comments'
      parameters:
        - in: path
          name: id
          schema:
            type: integer
          required: true
          description: 'Specifies the id of the comment to be voted'
      requestBody:
        required: true
        content:
          application/x-www-form-urlencoded:
            schema:
              $ref: '#/components/schemas/Vote'     
      responses:
        '200':
          description: 'Vote added successfully'
          content:
            application/json:
              schema:
                type: object
                properties:
                  rating: 
                    type: integer
        '400':
          description: 'Bad Request'
        '404':
          description: 'Comment not found'
    put:
      operationId: R408
      summary: 'R408: Edit vote on a comment'
      description: 'Allows a member to edit their vote on a comment. Access: OWN'
      tags:
        - 'M04: Comments'
      parameters:
        - in: path
          name: id
          schema:
            type: integer
          required: true
          description: 'Specifies the id of the comment where the vote is to be edited'
      requestBody:
        required: true
        content:
          application/x-www-form-urlencoded:
            schema:
              $ref: '#/components/schemas/Vote' 
      responses:
        '200':
          description: 'Vote edited successfully'
          content:
            application/json:
              schema:
                type: object
                properties:
                  rating: 
                    type: integer
        '400':
          description: 'Bad Request'
        '404':
          description: 'Comment not found'
    delete:
      operationId: R409
      summary: 'R409: Delete a vote on a comment'
      description: 'Allows a member to delete a vote on a comment. Access: OWN'
      tags:
        - 'M04: Comments'
      parameters:
        - in: path
          name: id
          schema:
            type: integer
          required: true
          description: 'Specifies the id of the comment where the vote is to be deleted'
      responses:
        '200':
          description: 'Vote deleted successfully'
          content:
            application/json:
              schema:
                type: object
                properties:
                  rating: 
                    type: integer
        '400':
          description: 'Bad Request'
        '404':
          description: 'Comment not found'


  /api/ban/{id}:
    post:
      operationId: R703
      summary: 'R703: Ban a user'
      description: 'Allows a administrator to ban a user. Access: ADM'
      tags:
        - 'M07: Administrator and Static Pages'
      parameters:
        - in: path
          name: id
          schema:
            type: integer
          required: true
          description: 'Specifies the id of the user to be banned'
      responses:
        '200':
          description: 'User banned successfully'
          content:
            application/json:
              schema:
                type: object
                items: 
                  $ref: '#/components/schemas/Member'
        '400':
          description: 'Bad Request'
        '404':
          description: 'User not found'

  /api/unban/{id}:
    post:
      operationId: R704
      summary: 'R704: Unban a user'
      description: 'Allows a administrator to unban a user. Access: ADM'
      tags:
        - 'M07: Administrator and Static Pages'
      parameters:
        - in: path
          name: id
          schema:
            type: integer
          required: true
          description: 'Specifies the id of the user to be unbanned'
      responses:
        '200':
          description: 'User unbanned successfully'
          content:
            application/json:
              schema:
                type: object
                items: 
                  $ref: '#/components/schemas/Member'
        '400':
          description: 'Bad Request'
        '404':
          description: 'User not found'

  /api/award/{id}:
    post:
      operationId: R705
      summary: 'R705: Award a user'
      description: 'Allows a administrator to award a user. Access: ADM'
      tags:
        - 'M07: Administrator and Static Pages'
      parameters:
        - in: path
          name: id
          schema:
            type: integer
          required: true
          description: 'Specifies the id of the user to be awarded'

      responses:
        '200':
          description: 'User awarded successfully'
          content:
            application/json:
              schema:
                type: object
                items: 
                  $ref: '#/components/schemas/Member'
        '400':
          description: 'Bad Request'
        '404':
          description: 'User not found'


  /api/users/{id}/reported:
    get:
      operationId: R706
      summary: 'R706: Reported Users'
      description: 'Shows Reported Users. Access: ADM'
      tags:
        - 'M07: Administrator and Static Pages'
      parameters:
        - in: path
          name: id
          schema:
            type: integer
          required: true
          description: 'Specifies the id of the user to be reported'
      responses:
        '200':
          description: 'Ok. Shows [UI13](https://git.fe.up.pt/lbaw/lbaw2021/lbaw2143/-/wikis/er#ui13-reported-posts)'
          content:
            application/json:
              schema:
                type: object
                properties:
                  threads:
                    type: array
                    items: 
                      $ref: '#/components/schemas/Thread_Preview'
                  comments:
                    type: array
                    items:
                      $ref: '#/components/schemas/Comment'
        '400':
          description: 'Bad Request'
        '404':
          description: 'Page not found'

  
  /api/users/{id}/top:
    get:
      operationId: R707
      summary: 'R707: Top Posts'
      description: 'Shows Top Posts. Access: ADM'
      tags:
        - 'M07: Administrator and Static Pages'
      parameters:
        - in: path
          name: id
          schema:
            type: integer
          required: true
          description: 'Specifies the id of the owner of the top posts'
      responses:
        '200':
          description: 'Ok. Shows [UI14](https://git.fe.up.pt/lbaw/lbaw2021/lbaw2143/-/wikis/er#ui14-top-posts)'
          content:
            application/json:
              schema:
                type: object
                properties:
                  threads:
                    type: array
                    items: 
                      $ref: '#/components/schemas/Thread_Preview'
                  comments:
                    type: array
                    items:
                      $ref: '#/components/schemas/Comment'
        '400':
          description: 'Bad Request'
        '404':
          description: 'Page not found'
 
  /search_users:
    get:
      operationId: R605
      summary: 'R605: Search For Users'
      description: 'Shows Users Search Results. Access: PUB'
      tags:
        - 'M06: Search'
      responses:
        '200':
          description: 'Ok. Shows [UI18](https://git.fe.up.pt/lbaw/lbaw2021/lbaw2143/-/wikis/er#ui18-search-for-users)'
          content:
            application/x-www-form-urlencoded:
              schema:
                type: array
                items: 
                  $ref: '#/components/schemas/Member'
        '400':
          description: 'Bad Request'
        '404':
          description: 'Page not found'
    post:
      operationId: R606
      summary: 'R606: Search for Users Form'
      description: 'Search for Users with specific criteria. Access: PUB'
      tags:
        - 'M06: Search'
      requestBody:
        content:
          application/x-www-form-urlencoded:
            schema:
              type: object
              properties:
                categories:
                  type: array
                  items: 
                    $ref: '#/components/schemas/Category'
                min_reputation:
                  type: integer
                max_reputation:
                  type: integer
                include_description:
                  type: boolean
      responses:
        '200':
          description: 'Reloads Page with updated Data'
          content:
            application/x-www-form-urlencoded:
              schema:
                type: array
                items:
                  $ref: '#/components/schemas/Member'
        '400':
          description: 'Bad Request''s'
  
  /api/users/{id}/friend_requests:
    get:
      operationId: R504
      summary: 'R504: Shows Member''s friends requests'
      description: 'Shows member''s friend requests. Access: USR'
      tags:
        - 'M05: Friends'
      parameters:
        - in: path
          name: id
          schema:
            type: integer
          description: 'Specifies the id of the member'
          required: true
      responses:
        '200':
          description: 'Ok'
          content:
            application/json:
              schema:
                type: array
                items: 
                  $ref: '#/components/schemas/Friend_Request'
        '400':
          description: 'Bad Request'
        '404':
          description: 'Member not found'

    post:
      operationId: R505
      summary: 'R505: Accept friend request'
      description: 'Accept friend request received. Access: PUB'
      tags:
        - 'M05: Friends'
      parameters:
        - in: path
          name: id
          schema:
            type: integer
          description: 'Specifies the id of the member'
          required: true
      responses:
        '200':
          description: 'Friendship added'
        '400':
          description: 'Bad Request''s'

components:
  schemas:
    Category:
      type: object
      properties:
        id:
          type: integer
        name:
          type: string
    Thread_Preview:
      type: object
      properties:
        id:
          type: integer
        title:
          type: string
        summary:
          type: string
        description:
          type: string
        creation_time:
          type: string
          format: date-time
        rating:
          type: integer
        id_owner:
          type: integer
        username:
          type: string
        num_comments:
          type: integer
        images:
          type: string
          format: byte
    Comment:
      type: object
      properties:
        id:
          type: integer
        description:
          type: string
        creation_time:
          type: string
          format: date-time
        rating:
          type: integer
        username:
          type: string
        id_owner:
          type: integer
    Reply_Comment:
      type: object
      properties:
        id:
          type: integer
        description:
          type: string
        creation_time:
          type: string
          format: date-time
        rating:
          type: integer
        username:
          type: string
        id_owner:
          type: integer
    Thread:
      type: object
      properties:
        id:
          type: integer
        title:
          type: string
        summary:
          type: string
        description:
          type: string
        creation_time:
          type: string
          format: date-time
        rating:
          type: integer
        id_owner:
          type: integer
        username:
          type: string
        num_comments:
          type: integer
        categories:
          type: array
          items:
            $ref: '#/components/schemas/Category'
        images:
          type: array
          items: 
            type: string
            format: byte
    Vote: 
      type: object
      properties:
        id_owner:
          type: integer
        vote:
          type: boolean
          enum: [true,false]
    Member:
      type: object
      properties:
        id:
          type: integer
        username:
          type: string
        reputation:
          type: integer
        profile_image:
          type: string
          format: byte
    Report:
      type: object
      properties:
        id_owner:
          type: integer
    Friend_Request:
      type: object
      properties:
        sender_id:
          type: integer
        sender_username:
          type: string
        profile_image:
          type: string
          format: byte
```

<div style="page-break-after: always; break-after: page;"></div>

## A8: Vertical prototype

The Vertical Prototype includes the implementation of the most important user stories and aims to validate the architecture presented, while also serving to gain familiarity with the technologies used in the project.

The implementation is based on the LBAW Framework and includes work on all layers of the architecture of the solution to implement: user interface, business logic and data access. The prototype includes the implementation of pages of visualization, insertion, edition and removal of information; the control of permissions in the access to the implemented pages; and a presentation of error and success messages.

### 1. Implemented Features

#### 1.1. Implemented User Stories

The following table describes the user stories from previous artefacts that were implemented in the prototype.

| User Story reference | **Name**           | Priority | Description                                                  |
| -------------------- | ------------------ | -------- | ------------------------------------------------------------ |
| US101                | View Home          | high     | As a *User*, I want to be able to access the Home Page, so that I can view a brief presentation of the website with trending news and reviews |
| US102                | See About          | high     | As a *User*, I want to be able to access the About Page, so that I can view the website's detailed description |
| US104                | View Threads       | high     | As a *User*, I want to be able to view any available Thread, so that I can be more informed |
| US201                | Sign-in            | high     | As a *Visitor*, I want to be able to authenticate into the system, so that I can access privileged information |
| US202                | Sign-up            | high     | As a *Visitor*, I want to be able to register into the system, so that I can authenticate myself into the system |
| US301                | Logout             | high     | As a *Member*, I want to be able to logout from the system, so that my account remains safe and others user can authenticate |
| US302                | Create a Thread    | high     | As a *Member*, I want to be able to create a Thread, so that I can be able to post my review of a game or share news with the community |
| US306                | Consult Profiles   | high     | As a *Member*, I want to be able to consult Members' Profile Pages, so that I can view his personal details and owned Threads |
| US309                | Manage Friendships | high     | As a *Member*, I want to be able to manage my friendships, so that I can send Friend Requests or remove *Members* from my Friends List |
| US401                | Edit Thread        | medium   | As an *Owner*, I want to be able to edit my existing Threads, so that I can keep them updated or correct mistakes |
| US105                | Consult FAQ        | medium   | As a *User*, I want to be able to access the FAQ Page, so that I can see the Frequently Asked Questions |

<div style="page-break-after: always; break-after: page;"></div>

#### 1.2. Implemented Web Resources

The next section describes the implemented web resources in the prototype.

##### Module M01: Authentication and Individual Profile

| Web Resource Reference      | URL                                                        |
| --------------------------- | ---------------------------------------------------------- |
| R101: Login Form            | [/login](http://lbaw2143.lbaw-prod.fe.up.pt/home)*         |
| R102: Login Action          | POST /login                                                |
| R103: Logout Action         | POST /logout                                               |
| R104: Register Form         | [/register](http://lbaw2143.lbaw-prod.fe.up.pt/register)   |
| R105: Register Action       | POST /register                                             |
| R108: Show Member's Profile | [/users/{id}](http://lbaw2143.lbaw-prod.fe.up.pt/users/21) |

(*) Note: Both Login Form and Recover Password Action do not have specific pages. Instead, they can be accessed through the Navigation Bar, which is present in every page.

##### Module M02: Threads

| Web Resource Reference      | URL                                                          |
| --------------------------- | ------------------------------------------------------------ |
| R201: Shows Home page       | [/home](http://lbaw2143.lbaw-prod.fe.up.pt/home)             |
| R202: Shows Top Threads     | [/top](http://lbaw2143.lbaw-prod.fe.up.pt/top)               |
| R203: Shows Recent Threads  | [/recent](http://lbaw2143.lbaw-prod.fe.up.pt/recent)         |
| R205: Shows Top News        | [/topnews](http://lbaw2143.lbaw-prod.fe.up.pt/topnews)       |
| R206: Shows Recent News     | [/recentnews](http://lbaw2143.lbaw-prod.fe.up.pt/recentnews) |
| R207: Shows Top Reviews     | [/topreviews](http://lbaw2143.lbaw-prod.fe.up.pt/topreviews) |
| R208: Shows Recent Reviews  | [/recentreviews](http://lbaw2143.lbaw-prod.fe.up.pt/recentreviews) |
| R207: Shows a Thread's Page | [/threads/{id}](http://lbaw2143.lbaw-prod.fe.up.pt/threads/1) |



##### Module 03: Thread Management

| Web Resource Reference         | URL                                                          |
| ------------------------------ | ------------------------------------------------------------ |
| R301: Shows Create Thread Page | [/create_thread](http://lbaw2143.lbaw-prod.fe.up.pt/create_thread)* |
| R302: Create Thread Action     | POST /create_thread                                          |
| R305: Edit Thread Form         | [/threads/{id}/edit](http://lbaw2143.lbaw-prod.fe.up.pt/threads/1/edit)* |
| R306: Edit Thread Action       | PUT /threads/{id}/edit                                       |

(*) Note: In order to be able to access the Create Thread Page, the User must be logged in. If the User is not logged in, he is redirected to the Home Page. Furthermore, access to Edit Thread is only granted if the User is logged in and is the owner of the specific Thread.

##### Module 05: Friends

| Web Resource Reference                 | URL                                                          |
| -------------------------------------- | ------------------------------------------------------------ |
| R501: View Member's Friends            | [/users/{id}/friends](http://lbaw2143.lbaw-prod.fe.up.pt/users/21/friends) |
| R502: Remove Friends from Friends List | /POST /users/{id}/friends                                    |



### Module 07: Administrator and Static Pages 

| Web Resource Reference                     | URL                                                |
| ------------------------------------------ | -------------------------------------------------- |
| R701: View About Us Page                   | [/about](http://lbaw2143.lbaw-prod.fe.up.pt/about) |
| R702: View Frequently Asked Questions Page | [/faq](http://lbaw2143.lbaw-prod.fe.up.pt/faq)     |



### 2. Prototype

The prototype is available at http://lbaw2143.lbaw-prod.fe.up.pt

**User Credentials:**

- Username: admin
- Email: adrng123@gmail.com
- Password: admin123

***

# Revision history

Changes made to the first submission:

- None

***

GROUP2143, 06/05/2021

* Carlos Lousada, up201806302@fe.up.pt (Editor)
* Filipe Recharte, up201806743@fe.up.pt
* José Rocha, up201806371@fe.up.pt
* Pedro Queirós, up201806329@fe.up.pt