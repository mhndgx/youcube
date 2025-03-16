# YouCube - A YouTube-like Video Platform

YouCube is a YouTube-inspired video sharing platform built using **Laravel**. It allows users to upload, like, comment, and interact with videos. Users can also create accounts, log in, and edit their profiles.

## Features

- **Video Upload**: Users can upload videos with titles and descriptions.
- **Like Videos**: Users can like videos, and the system tracks the number of likes.
- **View Count**: Each video has a view count that increases as users watch it.
- **Comment System**: Users can comment on videos and like/dislike comments.
- **Authentication**: Includes user authentication with login and registration.
- **Profile Management**: Users can edit their profile information.

## Technologies Used

- **Laravel**: PHP framework for the backend.
- **MySQL**: Database for storing user data, video information, and comments.
- **Blade**: Laravel templating engine for front-end.
- **Tailwind CSS**: Utility-first CSS framework for styling.
- **JavaScript**: For handling client-side interactivity.

## Screenshots
![لقطة شاشة 2025-03-17 024700](https://github.com/user-attachments/assets/9b703c96-93f2-4a09-af94-bc11305208bf)
![لقطة شاشة 2025-03-17 024744](https://github.com/user-attachments/assets/572b4cbe-5b9a-4272-8197-645c399d632c)
![لقطة شاشة 2025-03-17 024759](https://github.com/user-attachments/assets/69a8154e-a3ee-478e-afb0-382aceae36bb)
![لقطة شاشة 2025-03-17 024718](https://github.com/user-attachments/assets/dc772546-7389-4839-bc05-3b9a04e09955)



## Installation

To set up YouCube locally, follow these steps:

1. **Clone the Repository**:
    ```bash
    git clone https://github.com/yourusername/youcube.git
    ```

2. **Install Dependencies**:
    Navigate to the project folder and install the necessary dependencies:
    ```bash
    cd youcube
    composer install
    npm install
    ```

3. **Set Up Database**:
    Create a Sqlite :
    ```env
    DB_CONNECTION=sqlite
    ```

4. **Run Migrations**:
    Run the migrations to create the necessary database tables:
    ```bash
    php artisan migrate
    ```

5. **Run the Application**:
    Serve the application locally:
    ```bash
    php artisan serve
    ```
    Your application will be available at `http://localhost:8000`.

## Usage

- **Authentication**: 
    - Register an account or log in using the login screen.
  
- **Upload Video**:
    - Navigate to the upload page to add a video with a title and description.
  
- **Like Videos**: 
    - Click the "like" button on a video to increase its like count.
  
- **Commenting**:
    - Add comments under videos. You can also like or dislike individual comments.

- **Edit Profile**:
    - Go to the profile page to update your personal information and password.

## Contributing

If you would like to contribute to this project, feel free to fork the repository, create a branch, and submit a pull request. 

## License

YouCube is open-source software licensed under the MIT license.

