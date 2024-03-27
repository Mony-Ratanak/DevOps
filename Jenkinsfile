// Jenkinsfile

pipeline {
    agent any

    stages {
		stage('Git Checkout') {
            steps {
                echo 'Code checkout.'
                git branch: 'python-project', url: 'https://github.com/Mony-Ratanak/DevOps.git'
            }
        }
        stage('Prepare') {
            steps {
                echo 'Creating a virtual environment...'
                sh 'python3 -m venv venv'
                echo 'Installing required packages...'
                sh 'venv/bin/python -m pip install -r requirements.txt'
            }
        }
        stage('Test') {
            steps {             
               
                echo 'Running tests with coverage...'
                sh 'venv/bin/coverage run --source=. test_main.py'
                sh 'venv/bin/coverage xml -o coverage.xml'
                sh 'venv/bin/coverage html'
               
            }
        }
    }

    post {
        always {
        always {
            // Archive test results
            junit 'test-reports/*.xml'
        }
        }
    }
}
