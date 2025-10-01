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

        stage('Build Docker Image') {
            steps {
                script {
                    image = docker.build('hitendra369/my-jenkins-app:latest')
                }
            }
        }

        stage('Push Docker Image') {
            steps {
                script {
                    docker.withRegistry('https://index.docker.io/v1/', 'DOCKERHUB_CREDENTIALS') {
                        image.push('latest')
                    }
                }
            }
        }
    }
}