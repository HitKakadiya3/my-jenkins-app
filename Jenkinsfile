pipeline {
    agent any

    stages {
        stage('Checkout') {
            steps {
                checkout scm
            }
        }

        stage('Build Docker Image') {
            steps {
                sh 'docker build -t hitendra369/my-jenkins-app:latest .'
                sh 'docker images'
            }
        }

        stage('Test Build') {
            steps {
                sh 'echo "Laravel project build successful!"'
            }
        }
    }
}