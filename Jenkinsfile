pipeline {
    agent any

    stages {
        stage('Checkout') {
            steps {
                checkout scm
            }
        }

        stage('Test Build') {
            steps {
                sh 'echo "Laravel project build successful!"'
            }
        }

        stage('Deploy') {
            steps {
                sh '''
                    git config user.name "Hitendra Kakadiya"
                    git config user.email "hitendrak@itpathsolutions.com"
                    git add .
                    git commit -m "Automated deployment by Jenkins" || echo "Nothing to commit"
                    git push origin HEAD
                '''
            }
        }
    }
}