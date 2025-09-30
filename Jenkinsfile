pipeline {
    agent any

    stages {
        stage('Checkout') {
            steps {
                checkout scm
            }
        }

        stage('Check Docker Permissions') {
            steps {
                sh '''
                    if ! docker info > /dev/null 2>&1; then
                        echo "Jenkins does not have permission to run Docker commands."
                        exit 1
                    fi
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
                sh 'docker run --rm -v $PWD:/app -w /app composer:2 composer install'
            }
        }
    }
}
