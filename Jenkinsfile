node {
    stage('preparation') {
        // Checkout the master branch of the Laravel framework repository
        checkout([$class: 'GitSCM',
            branches: [[name: '*/master' ]],
            extensions: scm.extensions,
            userRemoteConfigs: [[
                url: 'git@github.com:gbro115/gloriafood-php.git',
                credentialsId: '22d0b221-e7f3-4f5c-8227-eaf2c65ff860'
            ]]
        ])
    }
    stage("composer_install") {
        // Run `composer update` as a shell script
        sh 'composer install'
    }
    stage("phpunit") {
        // Run PHPUnit
        sh 'vendor/bin/phpunit -c phpunit.xml --log-junit results/phpunit/phpunit.xml'
        junit 'results/phpunit/*.xml'
    }
}
