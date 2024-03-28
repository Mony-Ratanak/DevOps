// Jenkinsfile

pipeline {
    agent any
    // secret credentials
    environment {
        BOT_TOKEN = '6451695822:AAEvuVexMDi5jgKLycHSe_q45vvSFrsp9b8'
        CHAT_ID = '-1002142392049'
    }
    stages {
		stage('Git Checkout') {
            steps {
                echo 'Code checkout.'
                git reset --hard;\
                git fetch;\
                git branch: 'python-project', url: 'https://github.com/Mony-Ratanak/DevOps.git'/
                git pull;\
            }
        }
        stage('Prepare') {
            steps {
                echo 'Creating a virtual environment...'
                sh 'python3 -m venv venv'
                echo 'Installing required packages...'
                sh 'venv/bin/python -m pip install -r requirements.txt'
                sh 'mvn clean package'
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
        // always {
        // always {
        //     // Archive test results
        //     junit 'test-reports/*.xml'
        // }
        // }
        success {
            sh '''
                bash scripts/deployment.sh SUCCESS🟢
            '''
        }
        failure {
            sh '''
                bash scripts/deployment.sh FAILED🔴
            '''
        }
    }
}