  * Run your application:
    1. Change to the project directory
    2. Create your code repository with the git init command
    3. Execute the php -S 127.0.0.1:8000 -t public command
    4. Browse to the http://localhost:8000/ URL.

       Quit the server with CTRL-C.
       Run composer require server --dev for a better web server.

  * Read the documentation at https://symfony.com/doc



 What's next?


  * You're ready to use the Messenger component. You can define your own message buses
    or start using the default one right now by injecting the messenger.bus.default service
    or typehinting Symfony\Component\Messenger\MessageBusInterface in your code.

  * If you need to send messages to your broker, you can benefit from the built-in
    AMQP transport by:

    1. Installing the AMQP pack by running composer require amqp;
    2. Uncommenting the MESSENGER_TRANSPORT_DSN env var
       and framework.messenger.transports.amqp config;
    3. Routing your messages to the amqp sender.

  * Read the documentation at https://symfony.com/doc/master/messenger.html

