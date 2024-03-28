
pipeline
    {
       agent any
        stages
        {
          stage('Git Checkout') {
            steps {
                echo 'Code checkout.'
                git branch: 'springboot-project', url: 'https://github.com/Mony-Ratanak/DevOps/'
            }
          }
          stage('Build App')
          {
            steps
             {
              script {
                  def pom = readMavenPom file: 'pom.xml'
                  version = pom.version
              }
              sh "mvn clean install -DskipTests=true"
              sh "mvn clean package"
            }
          }
          
          stage('Test')
          {
            steps
            {
              sh "${mvnCmd} test -Dspring.profiles.active=test"
              //step([$class: 'JUnitResultArchiver', testResults: '**/target/surefire-reports/TEST-*.xml'])
            }
          }



          
        }
    }