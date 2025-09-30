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

        stage('Composer Install') {
            steps {
                sh 'docker run --rm -v $PWD:/app -w /app composer:2 composer install'
            }
        }
    }
}
