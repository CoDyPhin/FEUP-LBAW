# ER: Requirements Specification Component

Designed to enhance the gamer life experience, RNG allows the gaming community to share reviews, comments and news about their favorite or upcoming games in an easier way.

## A1: RNG – Reviews & News in Gaming

RNG is an online platform focused on sharing news and reviewing gaming related content, where users can interact with each other and discuss a variety of topics. 

In a world where gaming has increasingly gained popularity, it can be hard to keep up with new game releases as well as the feedback provided by the community as a whole. Not only does this pose as a challenge for the fans, but also for game developers, who may also struggle with finding relevant and accurate information regarding their games.
Taking this into account, RNG emerges as a solution to all of these problems, by offering its users a better experience. This platform was requested by FPDE (Federação Portuguesa de Desportos Eletrónicos) for the gaming community.

Upon registration, the platform's users are able to read, create and comment on several threads, which can vary from a simple piece of news to everything game related, such as an extensive review regarding a brand new game. Furthermore, there is an upvote/downvote system which can be used for rating posts. With this in mind, a post's rating is calculated by subtracting the number of downvotes from the number of upvotes. Additionally, users can also send friend requests to each other.

Users can belong to different groups - Visitors, Members and Administrators. Visitors are only able to read posts, whilst Members can also comment on them. In addition to this, they are also able to create their own posts, upvote/downvote other Users' posts, manage their account alongside with their friendships and make use of an advanced search and filtering capabilities. Administrators have full management permissions over the website and its Users in order to regulate the platform's content.

Every Users' groups, except Visitors, require authentication which can be completed by providing an email and password or using an external API, such as Google.


---


## A2: Actors and User stories

This artifact contains the specification of the actors and their users stories, serving as agile documentation of project requirements.

### 1. Actors

For the **RNG** system, the actors are represented in Figure 1 and described in Table 1.

<p align="center">   <img src="https://cdn.discordapp.com/attachments/809436153824411658/812342552497487882/Untitled_Diagram.png"> 
</p>




*Figure 1 - Actors*



| Identifier    | Description                                                  | Examples |
| ------------- | ------------------------------------------------------------ | -------- |
| User          | Generic user that has access to public information, such as reviews and news | n/a      |
| Visitor       | Unauthenticated user that can register itself (sign-up) or sign-in in the system | n/a      |
| Member        | Authenticated user that can create their own posts, comment and upvote/downvote other posts. | joao     |
| Owner         | Authenticated user that belongs to the same location as the creator of a post and is capable of editing his own posts. | joao     |
| Administrator | Authenticated user that is responsible for the management of users, content and some specific supervisory and moderation functions | admin    |
| OAuth API     | External OAuth API that can be used to register or authenticate into the system | Google   |

*Table 1 - Actor's description*

### 2. User Stories

For the **RNG** system, consider the user stories that are presented in the following sections.

#### 2.1. User

| Identifier | **Name**         | Priority | Description                                                  |
| ---------- | ---------------- | -------- | ------------------------------------------------------------ |
| US101      | View Home        | high     | As a *User*, I want to be able to access the Home Page, so that I can view a brief presentation of the website with trending news and reviews |
| US102      | See About        | high     | As a *User*, I want to be able to access the About Page, so that I can view the website's detailed description |
| US103      | Search           | high     | As a *User*, I want to be able to search for news and reviews, so that I can find what I'm looking for faster |
| US104      | View Threads     | high     | As a *User*, I want to be able to view any available Thread, so that I can be more informed |
| US105      | Consult FAQ      | medium   | As a *User*, I want to be able to access the FAQ Page, so that I can see the Frequently Asked Questions |
| US106      | Consult Profiles | medium   | As a *User*, I want to be able to consult Members' Profile Pages, so that I can view his personal details and owned Threads |

*Table 2 - User's user stories*

#### 2.2. Visitor

| Identifier | **Name**                   | Priority | Description                                                  |
| ---------- | -------------------------- | -------- | ------------------------------------------------------------ |
| US201      | Sign-in                    | high     | As a *Visitor*, I want to be able to authenticate into the system, so that I can access privileged information |
| US202      | Sign-up                    | high     | As a *Visitor*, I want to be able to register into the system, so that I can authenticate myself into the system |
| US203      | Sign-in using external API | low      | As a *Visitor*, I want to be able to authenticate into the system using my Google account, so that I can access privileged information |
| US204      | Sign-up using external API | low      | As a *Visitor*, I want to be able to register into the system using my Google account, so that I can authenticate myself into the system |

*Table 3 - Visitor's user stories*

#### 2.3. Member

| Identifier | **Name**              | Priority | Description                                                  |
| ---------- | --------------------- | -------- | ------------------------------------------------------------ |
| US301      | Logout                | high     | As a *Member*, I want to be able to logout from the system, so that my account remains safe and others user can authenticate |
| US302      | Create a Thread       | high     | As a *Member*, I want to be able to create a Thread, so that I can be able to post my review of a game or share news with the community |
| US303      | Comment on a Thread   | high     | As a *Member*, I want to be able to comment on a specific Thread, so that I can contribute to the discussion |
| US304      | Edit Profile          | high     | As a *Member*, I want to be able to edit my profile, so that I can keep it updated |
| US305      | Edit Account Settings | high     | As a *Member*, I want to be able to edit my account settings (eg. changing password), so that I can keep my account secure |
| US306      | Consult Profiles      | high     | As a *Member*, I want to be able to consult Members' Profile Pages, so that I can view his personal details and owned Threads |
| US307      | Vote a Thread         | high     | As a *Member*, I want to be able to upvote/downvote a Thread, so that other *Users* know what I think about the Thread |
| US308      | Vote a Comment        | high     | As a *Member*, I want to be able to upvote/downvote a Comment, so that other *Users* know what I think about the Comment |
| US309      | Manage Friendships    | high     | As a *Member*, I want to be able to manage my friendships, so that I can send Friend Requests or remove *Members* from my Friends List |
| US310      | Report Thread         | medium   | As a *Member*, I want to be able to report a Thread, so that I can flag any Thread I don't find appropriate for the platform |
| US311      | Report Comment        | medium   | As a *Member*, I want to be able to report a Comment, so that I can flag any Comment I don't find appropriate for the platform |
| US312      | Report Member         | medium   | As a *Member*, I want to be able to report others *Members*, so that I can flag any *Member* with an inappropriate behavior |

*Table 4 - Member's user stories*

#### 2.4. Owner

| Identifier | **Name**       | Priority | Description                                                  |
| ---------- | -------------- | -------- | ------------------------------------------------------------ |
| US401      | Edit Thread    | medium   | As an *Owner*, I want to be able to edit my existing Threads, so that I can keep them updated or correct mistakes |
| US402      | Edit Comment   | medium   | As an *Owner*, I want to be able to edit my existing Comments, so that I can keep them updated or correct mistakes |
| US403      | Delete Thread  | medium   | As an *Owner*, I want to be able to delete my existing Threads, so that I can remove any content I don't find relevant from the website |
| US404      | Delete Comment | medium   | As an *Owner*, I want to be able to delete my existing Comments, so that I can remove any comment I don't find relevant from the Thread |

*Table 5 - Owner's user stories*

#### 2.5. Administrator

| Identifier | **Name**                       | Priority | Description                                                  |
| ---------- | ------------------------------ | -------- | ------------------------------------------------------------ |
| US501      | Delete Thread                  | medium   | As an *Administrator*, I want to be able to delete any existing Threads, so that I can remove any content I don't find appropriate from the website |
| US502      | Delete Comment                 | medium   | As an *Administrator*, I want to be able to delete any existing Comments, so that I can remove any comment I don't find appropriate from any Thread |
| US503      | Ban User                       | medium   | As an *Administrator*, I want to be able to ban any  *Member*, so that I can keep the website free from any inappropriate content |
| US504      | Award Admin                    | medium   | As an *Administrator*, I want to be able to give Administrator privileges to a highly-reputed *Member*, so that he can contribute to the platform's management |
| US505      | Consult Reported Notifications | medium   | As an *Administrator*, I want to be able to consult the Reported Notifications List, so that I can assess the reported situation |
| US506      | Consult List Of Bans           | low      | As an *Administrator*, I want to be able to consult the List of Bans, so that I can keep track of the banned *Members* |
| US507      | Remove Ban                     | low      | As an *Administrator*, I want to be able to remove any ban from a specific *Member*, so that he can keep contributing to the website |

*Table 6 - Owner's user stories*

### 3. Supplementary Requirements

This annex contains business rules, technical requirements and other non-functional requirements on the project.

#### 3.1. Business rules

A business rule defines or constrains one aspect of the business, with the intention of asserting business structure or influencing business behavior.

| Identifier | **Name**                | Description                                                  |
| ---------- | ----------------------- | ------------------------------------------------------------ |
| BR01       | Reputation Points       | Reputation points represent the contribution of a *Member* to the platform, and is calculated according to the formula: NumberOfUpvotesOnPosts - NumberOfDownvotesOnPosts |
| BR02       | Self voting restriction | *Members* can't vote on their own posts                      |
| BR03       | User Deleted            | Whenever a User is deleted all its respective Comments, Threads and Personal Information must be deleted as well |
| BR04       | Delete Comment          | Whenever an Comment is deleted all its respective comments must be deleted as well |
| BR05       | Delete Thread           | Whenever a Thread is deleted all its respective comments must be deleted as well |
| BR06       | Banned Message          | Whenever a *Member* is banned, all comments and threads posted by him must be deleted |
| BR07       | Comment Date            | A comment's date must always be equal or greater than the respective Thread's date |
| BR08       | Administrator Badge     | A special badge is displayed next to every *Administrator*'s username in his Threads/Comments as well as in his Profile |

#### 3.2. Technical requirements

Technical requirements are concerned with the technical aspects that the system must meet, such as performance-related issues, reliability issues and availability issues. The three most critical Technical requirements are the first three to be identified (TR01, TR02, TR03).

| Identifier |      Name       |                         Description                          |
| :--------: | :-------------: | :----------------------------------------------------------: |
|    TR01    |  Availability   | The system must be available 99 percent of the time in each 24-hour period. |
|    TR02    |  Accessibility  | The system must ensure that everyone can access the pages, regardless of whether they have any handicap or not, or the Web browser they use. |
|    TR03    |    Usability    |         The system should be simple and easy to use.         |
|    TR04    |   Performance   | The system should have response times shorter than 2s to ensure the user's attention. |
|    TR05    | Web application | The system should be implemented as a Web application with dynamic pages (HTML5, JavaScript, CSS3 and PHP). |
|    TR06    |   Portability   | The server-side system should work across multiple platforms (Linux, Mac OS, etc.). |
|    TR07    |    Database     | The PostgreSQL 9.13 database management system must be used. |
|    TR08    |    Security     | The system shall protect information from unauthorized access through the use of an authentication and privilege verification system. |
|    TR09    |   Robustness    | The system must be prepared to handle and continue operating when runtime errors occur. |
|    TR10    |   Scalability   | The system must be prepared to deal with the growth in the number of users and corresponding operations. |
|    TR11    |     Ethics      | The system must respect the ethical principles in software development (for example, the password must be stored encrypted to ensure that only the owner knows it). |

#### 3.3. Restrictions

A restriction on the design limits the degree of freedom in the search for a solution.

| Identifier |   Name   |                         Description                          |
| :--------: | :------: | :----------------------------------------------------------: |
|    C01     | Deadline | The system should be ready to be used by the end of May, in order to be properly assessed for delivery. |




---


## A3: User Interface Prototype

The following artifact provides detailed insight into the project, which helps identifying and describing the user requirements; previewing and empirically testing the user interface of the platform to be developed; enabling quick and multiple iterations on the design of the user interface.

Taking this into account, this artifact includes an overview of the interface elements and features common to all pages as well as an overview of the information architecture from the viewpoint of the users. Additionally, the identification and description of the main interactions with the system, organized as sequences of screens (*wireflows*), is also provided.

The interface's descriptions are presented on the end of the document.


### 1. Interface and common features

In order to provide a good user interface, the *RNG* platform consists of a set of web pages made according to the latest standards: HTML5, Javascript and CSS3. Furthermore, Bootstrap was used for faster development.

The platform is based on a responsive design, thus being capable of adapting to multiple screens of different sizes and resolutions, without losing its core functionality.

![img](https://cdn.discordapp.com/attachments/809436153824411658/821165652668579860/unknown.png)

*Figure 1 - Main Interface*

1. **Logo**;
2. **Navigation Bar**;
3. **Preview of Posts**
4. **Copyrights**
5. **Detailed view of the Post**
6. **Comments and respective replies**

As seen in the previous figures, we opted for a simple and intuitive design, which allows the User to access information in an easier way. Furthermore, a Navigation Bar was implemented, which allows for various interactions with the User, depending on whether he is authenticated or not.

The platform is based on responsive design, meaning it is capable of suiting different screen sizes, which may vary from 19'' Desktops and 11'' Tables to 4'' Smartphones.

Since the platform focuses on Reviews/News and its respective Comments, we developed an individual page for each one of these, which provides a more detailed insight into a specific Post.

### 2. Sitemap

The sitemap gives the project team an idea of how the website is going to be build by helping to clarify the information hierarchy.

![img](https://cdn.discordapp.com/attachments/809436153824411658/822085935633793025/sitemap_1.png)

*Figure 2 - Sitemap*

### 3. Storyboards

This section displays step-by-step illustrations of the main use cases of the system.

[Link to InVision Project](https://projects.invisionapp.com/freehand/document/9P0jT0BWN)

**Log In and Sign Up**

![img](https://cdn.discordapp.com/attachments/809436153824411658/821163020860129299/unknown.png)

*Figure 3 - While browsing the website, the User can choose to Log In or Sign Up, by clicking on the "Log In" and "Sign Up" buttons, respectively.*



**Create a Post**

![img](https://cdn.discordapp.com/attachments/809436153824411658/821162636451381288/unknown.png)

*Figure 4 - If the User is logged in and wishes to create a new post he can do so by pressing the "Add New Post" button, which will redirect him to a specific page where he can fill out all the parameters related to the Post*

**Access Profile and Settings**

![img](https://cdn.discordapp.com/attachments/809436153824411658/821163227684798464/unknown.png)

*Figure 5 - If the User is logged in he can choose to access both his Profile Page and Settings through the dropdown present on the NavBar. The Profile Page allows the User to view all his personal Posts as well as his Friends List, while the Settings Page enables the User to change his Profile and Security Details.*



**Filter Reviews and News and Access About**

![img](https://cdn.discordapp.com/attachments/809436153824411658/821163551746031644/unknown.png)

*Figure 6 - From the NavBar, the User can choose to either view Reviews or News, by pressing the "Reviews" and "News" buttons, respectively. Furthermore, this will display the Top/Recent Reviews pr the Top/Recent News. Additionally, the User can choose to view the About Page, where he can find more information about the goal of the platform as well as the Developers Team behind it.*



**Edit Posts and View Notifications**

![img](https://cdn.discordapp.com/attachments/809436153824411658/821163942893846548/unknown.png)

*Figure 7 - If the User is logged in, he can edit his own Posts, by pressing the "Edit Post" button, present on the detailed page of the respective Post. This will redirect him to a specific page where he can make the desired changes. Additionally, the User can also view his notifications, such as new Friend Requests.*



**Administration Dashboard**

![img](https://cdn.discordapp.com/attachments/809436153824411658/821164082295734292/unknown.png)

*Figure 8 - If the User is logged in and has Administrator privileges, he can access the "Administration Dashboard" by pressing the "Administrator" button on the NavBar. This will redirect him to a new page where he can either view Posts and Comments reported by other Users as well as the current List of Banned Members. Furthermore, there is an option to unban a Member. Additionally, the User can also choose to give Administrator privileges to a highly reputed Member.*



**Search for Posts/Users and Consult FAQs**

![img](https://cdn.discordapp.com/attachments/809436153824411658/821164546764046336/unknown.png)

*Figure 9 - If the User wishes to search for a specific Post/User, he can do so by using the Search Bar on the NavBar. Furthermore, the User is redirect to a new page where he can filter the Posts/Users with more specific criteria. If the User wishes to see the FAQs (Frequently Asked Questions) he can do so by pressing the FAQs button in the Nav Bar.*



### 4. Interfaces

The following interfaces describe the main content of the web pages and their relative priority and help the project team previewing the features and behaviour of the final product's different screens, both their desktop (left) and mobile (right) versions.

| UI List                                                      |
| ------------------------------------------------------------ |
| [UI01: Home](#ui01-home)                                     |
| [UI02: Reviews Tab](#ui02-reviews-tab)                       |
| [UI03: News Tab](#ui03-news-tab)                             |
| [UI04: About](#ui04-about)                                   |
| [UI05: Frequently Asked Questions](#ui05-frequently-asked-questions) |
| [UI06: Login](#ui06-log-in)                                  |
| [UI07: Recover Password](#ui07-recover-password)             |
| [UI08: Sign Up](#ui08-sign-up)                               |
| [UI09: Create Post](#ui09-create-post)                       |
| [UI10: Edit Post](#ui10-edit-post)                           |
| [UI11: Thread](#ui11-thread)                                 |
| [UI12: Administration Dashboard](#ui12-administration-dashboard) |
| [UI13: Reported Posts](#ui13-reported-posts)                 |
| [UI14: Top Posts](#ui14-top-posts)                           |
| [UI15: Profile](#ui15-profile)                               |
| [UI16: Friends List](#ui16-friends-list)                     |
| [UI17: Search For Posts](#ui17-search-for-posts)             |
| [UI18: Search For Users](#ui18-search-for-users)             |
| [UI19: Settings](#ui19-settings)                             |



#### UI01: Home

On the Home Page, the User can choose to view the Top/Recent posts, the Top Categories or Create a New Post. The User can also upvote/downvote the Threads displayed to him. Furthermore, when the User presses the "Create New Post" button, he is redirected to the "Create a Post" Page. If a Visitor (non-authenticated member) presses this button, a "Sign-In" prompt appears.

| Desktop                                                      | Mobile                                                       |
| ------------------------------------------------------------ | ------------------------------------------------------------ |
| ![img](https://cdn.discordapp.com/attachments/809436153824411658/821142307419324516/localhost_8000_pages_homepage.php.png) | <img src="https://cdn.discordapp.com/attachments/809436153824411658/821142333927718953/localhost_8000_pages_homepage.phpGalaxy_S5.png" alt="img" width="350" /> |

| Desktop                                                      | Mobile                                                       |
| ------------------------------------------------------------ | ------------------------------------------------------------ |
| ![img](https://cdn.discordapp.com/attachments/809436153824411658/821142550215524352/localhost_8000_pages_homepage.php_2.png) | <img src="https://cdn.discordapp.com/attachments/809436153824411658/821142731761123368/localhost_8000_pages_homepage.phpiPhone_X.png" alt="img" width="450" /> |

*Figure 10 - [Home Page](http://lbaw2143-piu.lbaw-prod.fe.up.pt/pages/homepage.php)*

#### UI02: Reviews Tab

The Reviews Tab allows the User to only view Reviews.

| Desktop                                                      | Mobile                                                       |
| ------------------------------------------------------------ | ------------------------------------------------------------ |
| ![img](https://cdn.discordapp.com/attachments/809436153824411658/821150060863553536/localhost_8000_pages_reviews.php.png) | <img src="https://cdn.discordapp.com/attachments/809436153824411658/821148967994916934/localhost_8000_pages_news.phpiPhone_X.png" alt="img" width="450" /> |

| Desktop                                                      | Mobile                                                       |
| ------------------------------------------------------------ | ------------------------------------------------------------ |
| ![img](https://cdn.discordapp.com/attachments/809436153824411658/821150058577133608/localhost_8000_pages_reviews.php_1.png) | <img src="https://cdn.discordapp.com/attachments/809436153824411658/821150055905099786/localhost_8000_pages_reviews.phpiPhone_X_1.png" alt="img" width="450" /> |

*Figure 11 - [Reviews Page](http://lbaw2143-piu.lbaw-prod.fe.up.pt/pages/reviews.php)*

#### UI03: News Tab

The News Tab allows the User to only view News.

| Desktop                                                      | Mobile                                                       |
| ------------------------------------------------------------ | ------------------------------------------------------------ |
| ![img](https://cdn.discordapp.com/attachments/809436153824411658/821148971849351248/localhost_8000_pages_news.php.png) | <img src="https://cdn.discordapp.com/attachments/809436153824411658/821148967994916934/localhost_8000_pages_news.phpiPhone_X.png" alt="img" width="450" /> |

| Desktop                                                      | Mobile                                                       |
| ------------------------------------------------------------ | ------------------------------------------------------------ |
| ![img](https://cdn.discordapp.com/attachments/809436153824411658/821148969572761641/localhost_8000_pages_news.php_1.png) | <img src="https://cdn.discordapp.com/attachments/809436153824411658/821150057054732309/localhost_8000_pages_reviews.phpiPhone_X.png" alt="img" width="450" /> |

*Figure 12 - [News Page](http://lbaw2143-piu.lbaw-prod.fe.up.pt/pages/news.php)*

#### UI04: About

The About Us Page provides the User with some insight concerning the main focus of the platform as well as a small description for each Member on the Developer's Team.

| Desktop                                                      | Mobile                                                       |
| ------------------------------------------------------------ | ------------------------------------------------------------ |
| ![img](https://cdn.discordapp.com/attachments/809436153824411658/821142986452107294/localhost_8000_pages_about.php_1.png) | <img src="https://cdn.discordapp.com/attachments/809436153824411658/821142983645724732/localhost_8000_pages_about.phpiPhone_X.png" alt="img" width="450" /> |

*Figure 13 - [About Page](http://lbaw2143-piu.lbaw-prod.fe.up.pt/pages/about.php)*

#### UI05: Frequently Asked Questions 

The Frequently Asked Questions Page allows the User to find answers to the most common questions amongst the platform's Members.

| Desktop                                                      | Mobile                                                       |
| ------------------------------------------------------------ | ------------------------------------------------------------ |
| ![img](https://cdn.discordapp.com/attachments/809436153824411658/821146606186922034/localhost_8000_pages_faq.php.png) | <img src="https://cdn.discordapp.com/attachments/809436153824411658/821146604408012840/localhost_8000_pages_faq.phpiPhone_X.png" alt="img" width="450" /> |

*Figure 14 - [FAQ Page](http://lbaw2143-piu.lbaw-prod.fe.up.pt/pages/faq.php)*

#### UI06: Log In

The Log In is a clickable Pop-Up, which appears whenever a non-authenticated User presses the "Log In" button. It allows the User to enter his account details and log in to the Platform.

| Desktop                                                      | Mobile                                                       |
| ------------------------------------------------------------ | ------------------------------------------------------------ |
| ![img](https://cdn.discordapp.com/attachments/809436153824411658/821151717336547338/localhost_8000_pages_homepage.php.png) | <img src="https://cdn.discordapp.com/attachments/809436153824411658/821151715750707220/localhost_8000_pages_homepage.phpiPhone_X.png" alt="img" width="350" /> |

*Figure 15 - [Log In Page](http://lbaw2143-piu.lbaw-prod.fe.up.pt/pages/homepage.php)*

#### UI07: Recover Password

The Recover Password Pop-Up appears when, during the Log in phase, the User can't remember his password and wishes to be sent a recovery email with steps on how to create a new password.

| Desktop                                                      | Mobile                                                       |
| ------------------------------------------------------------ | ------------------------------------------------------------ |
| ![img](https://cdn.discordapp.com/attachments/809436153824411658/821151913541894174/localhost_8000_pages_homepage.php_1.png) | <img src="https://cdn.discordapp.com/attachments/809436153824411658/821151912358313994/localhost_8000_pages_homepage.phpiPhone_X_1.png" alt="img" width="350" /> |

*Figure 16 - [Recover Password Page](http://lbaw2143-piu.lbaw-prod.fe.up.pt/pages/homepage.php)*

#### UI08: Sign Up

The Sign Up Page allows the User to create a new account, by filling out a form, which contains his Username, Email Address and Password. Additionally, the User can choose to Sign Up using Google OAuth API.

| Desktop                                                      | Mobile                                                       |
| ------------------------------------------------------------ | ------------------------------------------------------------ |
| ![img](https://cdn.discordapp.com/attachments/809436153824411658/821151728489594930/localhost_8000_pages_signup.php_.png) | <img src="https://cdn.discordapp.com/attachments/809436153824411658/821151721120202752/localhost_8000_pages_signup.php_iPhone_X.png" alt="img" width="350" /> |

*Figure 17 - [Sign Up Page](http://lbaw2143-piu.lbaw-prod.fe.up.pt/pages/signup.php)*

#### UI09: Create Post

The Create Post Page allows the User to fill out a detailed form concerning a Post he wishes to create. After the form is filled out, the User must press the "Post" button in order to create the desired Post on the platform.

| Desktop                                                      | Mobile                                                       |
| ------------------------------------------------------------ | ------------------------------------------------------------ |
| ![img](https://cdn.discordapp.com/attachments/809436153824411658/821146192590405702/localhost_8000_pages_create_post.php.png) | <img src="https://cdn.discordapp.com/attachments/809436153824411658/821146191277326357/localhost_8000_pages_create_post.phpiPhone_X.png" alt="img" width="350" /> |

*Figure 18 - [Create Post Page](http://lbaw2143-piu.lbaw-prod.fe.up.pt/pages/create_post.php)*

#### UI10: Edit Post

The Edit Post Page allows the User to edit any Post which has already been created. 

| Desktop                                                      | Mobile                                                       |
| ------------------------------------------------------------ | ------------------------------------------------------------ |
| ![img](https://cdn.discordapp.com/attachments/809436153824411658/821146391610392596/localhost_8000_pages_edit_post.php.png) | <img src="https://cdn.discordapp.com/attachments/809436153824411658/821146390737977354/localhost_8000_pages_edit_post.phpiPhone_X.png" alt="img" width="350" /> |

*Figure 19 - [Edit Post Page](http://lbaw2143-piu.lbaw-prod.fe.up.pt/pages/edit_post.php)*

#### UI11: Thread

The Thread Post allows the User to view a detailed description of a certain Post, including the images associated with them. Furthermore, if logged in, the User can also choose to leave a comment on the Comment Section. Similar to the Home Page, the User also has the option the create a new post.

| Desktop                                                      | Mobile                                                       |
| ------------------------------------------------------------ | ------------------------------------------------------------ |
| ![img](https://cdn.discordapp.com/attachments/809436153824411658/821147429139120138/localhost_8000_pages_thread.php.png) | <img src="https://cdn.discordapp.com/attachments/809436153824411658/821148342095446047/Screenshot_from_2021-03-15_22-29-40.png" alt="img" width="450" /> |

*Figure 20 - [Thread Page](http://lbaw2143-piu.lbaw-prod.fe.up.pt/pages/thread.php)*

#### UI12: Administration Dashboard

The Administration Dashboard allows the User to access the lists of Reported Users, Banned Users and Award Admin. On the Reported Users Tab, the User has the option to see the Report Posts of each Reported Member and or to instantly ban them. On the Banned Users Tab, the User can view the List of Banned Members and choose whether to Unban them or not. On the Award Admin Tab, the User has the option to see the the Top Posts of each Highly Reputed Member and to award the Administrator Privileges if he considers them to be worthy of such. The Administration Dashboard is only available for Users with Administrator privileges.



| Desktop                                                      | Mobile                                                       |
| ------------------------------------------------------------ | ------------------------------------------------------------ |
| ![img](https://cdn.discordapp.com/attachments/809436153824411658/821911555431071744/localhost_8000_pages_administration.php_3.png) | <img src="https://cdn.discordapp.com/attachments/809436153824411658/821911558804209694/localhost_8000_pages_administration.phpiPhone_X_3.png" alt="img" width="450" /> |

| Desktop                                                      | Mobile                                                       |
| ------------------------------------------------------------ | ------------------------------------------------------------ |
| ![img](https://cdn.discordapp.com/attachments/809436153824411658/821911552638320640/localhost_8000_pages_administration.php_4.png) | <img src="https://cdn.discordapp.com/attachments/809436153824411658/821911554520907796/localhost_8000_pages_administration.phpiPhone_X_4.png" alt="img" width="450" /> |

| Desktop                                                      | Mobile                                                       |
| ------------------------------------------------------------ | ------------------------------------------------------------ |
| ![img](https://cdn.discordapp.com/attachments/809436153824411658/821911551296143361/localhost_8000_pages_administration.php_5.png) | <img src="https://cdn.discordapp.com/attachments/809436153824411658/821911550570397756/localhost_8000_pages_administration.phpiPhone_X_5.png" alt="img" width="450" /> |

*Figure 21 - [Administration Page](http://lbaw2143-piu.lbaw-prod.fe.up.pt/pages/thread.php)*

#### UI13: Reported Posts

The Reported Posts Page allows the User to view all Reported Posts from a specific User, in order to conclude whether or not the User should be banned. This page can be accessed from the Administration Dashboard, which is only available for Users with Administrator Privileges.



| Desktop                                                      | Mobile                                                       |
| ------------------------------------------------------------ | ------------------------------------------------------------ |
| ![img](https://cdn.discordapp.com/attachments/809436153824411658/821914281670737970/localhost_8000_pages_reported_posts.php_1.png) | <img src="https://cdn.discordapp.com/attachments/809436153824411658/821914280538144818/localhost_8000_pages_reported_posts.phpiPhone_X_1.png" alt="img" width="350" /> |
*Figure 22 - [Reported Posts Page](http://lbaw2143-piu.lbaw-prod.fe.up.pt/pages/reported_posts.php)*

#### UI14: Top Posts

The Top Posts Page allows the User to view the Top Posts from a specific User, in order to conclude whether or not the User is worthy of Adminstrator Privileges. This page can be accessed from the Administration Dashboard, which is only available for Users with Administrator Privileges.



| Desktop                                                      | Mobile                                                       |
| ------------------------------------------------------------ | ------------------------------------------------------------ |
| ![img](https://cdn.discordapp.com/attachments/809436153824411658/821914583760502824/localhost_8000_pages_top_posts.php_1.png) | <img src="https://cdn.discordapp.com/attachments/809436153824411658/821914582649143327/localhost_8000_pages_top_posts.phpiPhone_X_1.png" alt="img" width="350" /> |
*Figure 23 - [Top Posts Page](http://lbaw2143-piu.lbaw-prod.fe.up.pt/pages/top_posts.php)*

#### UI15: Profile

Each User's Profile Page consists of a small card, which contains personal details such as username and brief description, as well as a list of all Posts made by that specific User.

| Desktop                                                      | Mobile                                                       |
| ------------------------------------------------------------ | ------------------------------------------------------------ |
| <img src="https://cdn.discordapp.com/attachments/809436153824411658/821907849286385664/localhost_8000_pages_profile.php_1.png" alt="img"/> | <img src="https://cdn.discordapp.com/attachments/809436153824411658/821907755828903966/localhost_8000_pages_profile.phpiPhone_X_1.png" alt="img" width="350" /> |

*Figure 24 - [Top Posts Page](http://lbaw2143-piu.lbaw-prod.fe.up.pt/pages/profile.php)*

#### UI16: Friends List 

The Friends List Page allows the User to view all of his current Friends on the platform. If the User wishes to remove one of his Friends he can do so by pressing the "Trash Can" button on the respective Friend's Card.

| Desktop                                                      | Mobile                                                       |
| ------------------------------------------------------------ | ------------------------------------------------------------ |
| ![img](https://cdn.discordapp.com/attachments/809436153824411658/821147081288187914/localhost_8000_pages_friends.php.png) | <img src="https://cdn.discordapp.com/attachments/809436153824411658/821147080231616562/localhost_8000_pages_friends.phpiPhone_X.png" alt="img" width="450" /> |

*Figure 25 - [Friends List Page](http://lbaw2143-piu.lbaw-prod.fe.up.pt/pages/friends.php)*

#### UI17: Search for Posts

The Search for Posts Page allows the User to filter Posts, by using a specific keyword or a set of generic filters, such as Categories, Rating and Date.

| Desktop                                                      | Mobile                                                       |
| ------------------------------------------------------------ | ------------------------------------------------------------ |
| ![img](https://cdn.discordapp.com/attachments/809436153824411658/821141207001333770/localhost_8000_pages_search.php_.png) | <img src="https://cdn.discordapp.com/attachments/809436153824411658/821150414769618964/localhost_8000_pages_search.php_iPhone_X_1.png" alt="img" width="350" /> |

| Desktop                                                      | Mobile                                                       |
| ------------------------------------------------------------ | ------------------------------------------------------------ |
| ![img](https://cdn.discordapp.com/attachments/809436153824411658/821150421321908294/localhost_8000_pages_search.php__1.png) | <img src="https://cdn.discordapp.com/attachments/809436153824411658/821150414769618964/localhost_8000_pages_search.php_iPhone_X_1.png" alt="img" width="350" /> |

| Desktop                                                      | Mobile                                                       |
| ------------------------------------------------------------ | ------------------------------------------------------------ |
| ![img](https://cdn.discordapp.com/attachments/809436153824411658/821150418867847218/localhost_8000_pages_search.php__2.png) | <img src="https://cdn.discordapp.com/attachments/809436153824411658/821150413960511508/localhost_8000_pages_search.php_iPhone_X_2.png" alt="img" width="350" /> |

*Figure 26 - [Search For Posts Page](http://lbaw2143-piu.lbaw-prod.fe.up.pt/pages/search.php)*

#### UI18: Search for Users

The Search for Users Page allows the User to search for other Users, by using a specific keyword or a set of generic filters, such as Reputation or on which categories have other Users posted on.



| Desktop                                                      | Mobile                                                       |
| ------------------------------------------------------------ | ------------------------------------------------------------ |
| ![img](https://cdn.discordapp.com/attachments/809436153824411658/821915828827193354/localhost_8000_pages_search_user.php_3.png) | <img src="https://cdn.discordapp.com/attachments/809436153824411658/821915831075864576/localhost_8000_pages_search_user.phpiPhone_X_3.png" alt="img" width="350" /> |

| Desktop                                                      | Mobile                                                       |
| ------------------------------------------------------------ | ------------------------------------------------------------ |
| ![img](https://cdn.discordapp.com/attachments/809436153824411658/821915827095732274/localhost_8000_pages_search_user.php_4.png) | <img src="https://cdn.discordapp.com/attachments/809436153824411658/821915825962876948/localhost_8000_pages_search_user.phpiPhone_X_4.png" alt="img" width="350" /> |

| Desktop                                                      | Mobile                                                       |
| ------------------------------------------------------------ | ------------------------------------------------------------ |
| ![img](https://cdn.discordapp.com/attachments/809436153824411658/821915823073001512/localhost_8000_pages_search_user.php_5.png) | <img src="https://cdn.discordapp.com/attachments/809436153824411658/821915824457252884/localhost_8000_pages_search_user.phpiPhone_X_5.png" alt="img" width="350" /> |

*Figure 27 - [Search For Users Page](http://lbaw2143-piu.lbaw-prod.fe.up.pt/pages/search_user.php)*

#### UI19: Settings

The Settings Page allows the User to change both his Account Personal Details, such as Profile Image, Header, Description and Username, as well as his Security Details, such as Password and Email Address.

| Desktop                                                      | Mobile                                                       |
| ------------------------------------------------------------ | ------------------------------------------------------------ |
| ![img](https://cdn.discordapp.com/attachments/809436153824411658/821151224954093608/localhost_8000_pages_settings.php.png) | <img src="https://cdn.discordapp.com/attachments/809436153824411658/821151220986019840/localhost_8000_pages_settings.phpiPhone_X.png" alt="img" width="350" /> |

| Desktop                                                      | Mobile                                                       |
| ------------------------------------------------------------ | ------------------------------------------------------------ |
| ![img](https://cdn.discordapp.com/attachments/809436153824411658/821151221842575360/localhost_8000_pages_settings.php_1.png) | <img src="https://cdn.discordapp.com/attachments/809436153824411658/821151219254951946/localhost_8000_pages_settings.phpiPhone_X_1.png" alt="img" width="350" /> |

*Figure 28 - [Settings Page](http://lbaw2143-piu.lbaw-prod.fe.up.pt/pages/settings.php)*


## Revision history

Changes made to the first submission:

1. 16/04/2021: Updated the formula for calculating a Member's Reputation Points
2. 28/05/2021: Changed the priority of user stories US203 and US204 from Medium to Low

***

GROUP2143, 17/03/2021

* Carlos Lousada, up201806302@fe.up.pt
* Filipe Recharte, up201806743@fe.up.pt (Editor)
* José Rocha, up201806371@fe.up.pt
* Pedro Queirós, up201806329@fe.up.pt