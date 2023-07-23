#  PA: Product and Presentation

Designed to enhance the gamer life experience, RNG allows the gaming community to share reviews, comments and news about their favorite or upcoming games in an easier way.

## A9: Product

The goal of this artefact is to showcase the finished product, analyzing its input validation, accessibility, usage and implementation details. It also contains an installation guide to run the project image locally.

Our product, RNG - Reviews & News in Gaming, consists of a platform where users can interact with each other and discuss a variety of topics.

### 1. Installation

Link to the release with the final version of the source code in the group's git repository:  [https://github.com/CoDyPhin/FEUP-LBAW](https://github.com/CoDyPhin/FEUP-LBAW)

To run the project image locally, simply run the following commands:

```bash
# Get the required modules
composer install

# Install Pusher
composer require pusher/pusher-php-server

# Build the image
docker build -t lbaw2143/lbaw2143

#Run the image
docker run -it -p 8000:80 -e DB_DATABASE="lbaw2143" -e DB_USERNAME="lbaw2143" -e DB_PASSWORD="PE777769" lbaw2143/lbaw2143
```

 Bare in mind that, in order to use the register functionality, you should change the following line in the file ``/vendor/laravel/ui/auth-backend/RegistersUsers.php``:

From this:

``32:        $this->validator($request->all())->validate();``

To this:

``32:        $this->validator($request->all());`` 



### 2. Usage

URL to the product: [http://lbaw2143.lbaw-prod.fe.up.pt](http://lbaw2143.lbaw-prod.fe.up.pt/)

#### 2.1. Administration Credentials

Administration URL: http://lbaw2143.lbaw-prod.fe.up.pt/administration

| Username | Password |
| -------- | -------- |
| admin    | admin123 |

#### 2.2. User Credentials

| Type          | Username | Password |
| ------------- | -------- | -------- |
| basic account | abenns0  | admin123 |



### 3. Application Help

Help has been implemented across various features in the website to show to the User the success/unsuccess of their actions:

- When an Unauthenticated User tries to use a feature exclusive for Members (such as upvoting/downvoting, reply or create a thread) a pop up with the login modal will appear, indicating that he must be logged in to perform that action.
- When a Member reports/deletes a Thread/Comment, changes their Personal Information, logs in or deletes their account, a confirmation message will appear, indicating the success/unsuccess of their action.
- When an Administrator bans/unbans or awards Administrator privileges to another Member, a confirmation message will appear, indicating the success/unsuccess of their action.
- There is some contextual help when creating a Thread, which clarifies what each input lines means.



### 4. Input Validation

Input Validation is implemented both in the client and server side:

-  On the server side, the requests are validated before executing any kind of action to ensure the correct behavior of the platform.
-  On the client side, the input is validated to provide a simple and intuitive feedback about the information given by the member.

Input Validation can be found in the log in/sign up actions as well as in the creating/editing a thread and updating security settings. 



### 5. Check Accessibility and Usability

[Accessibility](https://github.com/CoDyPhin/FEUP-LBAW/blob/master/artifacts/Checklist_de_Acessibilidade_-_SAPO_UX.pdf)

[Usability](https://github.com/CoDyPhin/FEUP-LBAW/blob/master/artifacts/Checklist_de_Usabilidade_-_SAPO_UX.pdf)



### 6. HTML & CSS Validation

The results of the validation of the HTML and CSS can be found here:

[HTML Home Page](https://github.com/CoDyPhin/FEUP-LBAW/blob/master/artifacts/home-validation.pdf)

[HTML Thread Page](https://github.com/CoDyPhin/FEUP-LBAW/blob/master/artifacts/thread-validation.pdf) 

[CSS](https://github.com/CoDyPhin/FEUP-LBAW/blob/master/artifacts/css-validation.pdf)



### 7. Revisions to the Project

Since the requirements specification stage, some changes were made to the project:

- **ER** - Updated some User Stories.
- **EBD** - Added *Notifications* table, in order to be able to work with *Laravel* notifications.
- **EAP** - Updated some of the used endpoints.



### 8. Implementation Details

#### 8.1. Libraries Used

This section contains all the libraries used in the project.

##### Pusher

This library was used in order to have real-time notifications.

##### jQuery

This library was used to aid in the implementation of infinte scrolling and some other details.

##### Selectized

This library was used to create a new type of HTML Form user input (a mixture of text with select-options), improving usability when searching for categories (filtered search).

##### Gmail SMTP Server

The Gmail SMTP Server provides a password recovery system, sending a verification email to the user.



#### 8.2 User Stories

| US Identifier | Name                           | Module   | Priority | Team Members                       | State |
| ------------- | ------------------------------ | -------- | -------- | ---------------------------------- | ----- |
| US101         | View Home                      | Module 2 | High     | **Carlos Lousada**                 | 100%  |
| US102         | See About                      | Module 7 | High     | **Carlos Lousada**                 | 100%  |
| US105         | Consult FAQ                    | Module 7 | High     | **Carlos Lousada**                 | 100%  |
| US104         | View Threads                   | Module 2 | High     | **Pedro Queirós**                  | 100%  |
| US201         | Sign-in                        | Module 1 | High     | **Filipe Recharte**                | 100%  |
| US202         | Sign-up                        | Module 1 | High     | **Filipe Recharte**                | 100%  |
| US301         | Logout                         | Module 1 | High     | **Filipe Recharte**                | 100%  |
| US302         | Create a Thread                | Module 3 | High     | **Pedro Queirós**                  | 100%  |
| US306         | Consult Profiles               | Module 5 | High     | **Pedro Queirós**                  | 100%  |
| US303         | Comment on a Thread            | Module 4 | High     | **Pedro Queirós**                  | 100%  |
| US401         | Edit Thread                    | Module 3 | Medium   | **Pedro Queirós**                  | 100%  |
| US402         | Edit Comment                   | Module 4 | Medium   | **Pedro Queirós**                  | 100%  |
| US403         | Delete Thread                  | Module 3 | Medium   | **Pedro Queirós**                  | 100%  |
| US404         | Delete Comment                 | Module 4 | Medium   | **Pedro Queirós**                  | 100%  |
| US307         | Vote a Thread                  | Module 3 | High     | **Filipe Recharte**, Pedro Queirós | 100%  |
| US308         | Vote a Comment                 | Module 3 | High     | **Filipe Recharte**, Pedro Queirós | 100%  |
| US304         | Edit Profile                   | Module 1 | High     | **José Rocha**                     | 100%  |
| US305         | Edit Account Settings          | Module 1 | High     | **José Rocha**                     | 100%  |
| US503         | Ban User                       | Module 7 | Medium   | **José Rocha**                     | 100%  |
| US504         | Award Admin                    | Module 7 | Medium   | **José Rocha**                     | 100%  |
| US505         | Consult Reported Notifications | Module 7 | Medium   | **José Rocha**                     | 100%  |
| US310         | Report Thread                  | Module 3 | Medium   | **Filipe Recharte**                | 100%  |
| US311         | Report Comment                 | Module 3 | Medium   | **Filipe Recharte**                | 100%  |
| US103         | Search                         | Module 6 | High     | **Carlos Lousada**, Pedro Queirós  | 100%  |
| US309         | Manage Friendships             | Module 5 | High     | **Filipe Recharte**                | 100%  |



In addition to the High/Medium Priority User Stories, we also implemented two Low Priority User Stories

| US Identifier | Name                 | Module   | Priority | Team Members   | State |
| ------------- | -------------------- | -------- | -------- | -------------- | ----- |
| US506         | Consult List Of Bans | Module 7 | Low      | **José Rocha** | 100%  |
| US507         | Remove Ban           | Module 7 | Low      | **José Rocha** | 100%  |

------

## A10: Presentation

### 1. Product presentation

RNG is an online platform focused on sharing news and reviewing gaming related content, where users can interact with each other and discuss a variety of topics.

In a world where gaming has increasingly gained popularity, it can be hard to keep up with new game releases as well as the feedback provided by the community as a whole. Not only does this pose as a challenge for the fans, but also for game developers, who may also struggle with finding relevant and accurate information regarding their games. Taking this into account, RNG emerges as a solution to all of these problems, by offering its users a better experience. Furthermore, this project is intended to be used by FPDE (Federação Portuguesa de Desportos Eletrónicos), so they can have a platform where its Users can interact with each other and discuss news and reviews.

URL to the product: [http://lbaw2143.lbaw-prod.fe.up.pt](http://lbaw2143.lbaw-prod.fe.up.pt)



### 2. Video presentation

Link to the lbaw2143.mp4 file: https://drive.google.com/file/d/17exsYEVptIdnGJ0-vW8ZVVE0NPitpPoI/view?usp=sharing

![img](https://cdn.discordapp.com/attachments/809436153824411658/852869698923921408/unknown.png)

Figure 1: Video Screenshot

------

## Revision history

Changes made to the first submission: N/A

------

- GROUP2143, 07/05/2021

  * Carlos Lousada, up201806302@fe.up.pt
  * Filipe Recharte, up201806743@fe.up.pt
  * José Rocha, up201806371@fe.up.pt
  * Pedro Queirós, up201806329@fe.up.pt (Editor)
