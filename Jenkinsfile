pipeline {
    agent any

    // secret credentials
    environment {
        BOT_TOKEN = credentials('telegram_token')
        CHAT_ID = credentials('telegram_chatid')

    }
    stages {
        stage('Deployment') {
            // environment variables
            steps {
                sh 'ssh -o StrictHostKeyChecking=no root@$APP_SERVICE_IP "cd /root/monyratanak/POS/api;\
                git reset --hard;\
                git fetch;\
                git checkout devops-monyratanak;\
                git pull;\
                "'
            }
            // steps {
            //     sh '''
            //         echo "Good Evening"
            //         git reset sadsadsad
            //     '''
            // }
        }
    }
    post {
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
