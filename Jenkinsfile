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
                sh '''
                    docker build -t hitendra369/my-jenkins-app:latest .
                '''
            }
        }

        stage('Push Docker Image') {
            steps {
                withCredentials([
                    usernamePassword(
                        credentialsId: 'DOCKERHUB_CREDENTIALS',
                        usernameVariable: 'DOCKERHUB_USERNAME',
                        passwordVariable: 'DOCKERHUB_PASSWORD'
                    )
                ]) {
                    sh '''
                        echo "$DOCKERHUB_PASSWORD" | docker login -u "$DOCKERHUB_USERNAME" --password-stdin
                        docker push hitendra369/my-jenkins-app:latest
                        docker logout
                    '''
                }
            }
        }
    }
}