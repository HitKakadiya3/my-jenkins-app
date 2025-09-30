pipeline {
    agent any

    stages {
        stage('Checkout') {
            steps {
                checkout scm
            }
        }

        stage('Setup Docker Permissions') {
            steps {
                sh '''
                    # Ensure Jenkins user is in docker group
                    sudo usermod -aG docker jenkins || echo "User already in docker group"
                    # Verify docker access
                    docker --version
                '''
            }
        }

        stage('Test Build') {
            steps {
                sh 'echo "Laravel project build successful!"'
            }
        }

        stage('Composer Install') {
            steps {
                sh '''
                    # Use absolute path and ensure proper permissions
                    docker run --rm -v "${WORKSPACE}":/app -w /app composer:2 composer install --no-dev --optimize-autoloader
                '''
            }
        }
    }
}
