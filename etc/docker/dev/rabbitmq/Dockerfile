FROM rabbitmq:3.8.8-management

RUN apt-get update && apt-get install wget unzip -y \
    && wget https://github.com/rabbitmq/rabbitmq-delayed-message-exchange/releases/download/v3.8.0/rabbitmq_delayed_message_exchange-3.8.0.ez -P /plugins \
    && cd /plugins \
    && rabbitmq-plugins enable \
       rabbitmq_delayed_message_exchange

COPY config/rabbitmq.conf /etc/rabbitmq/rabbitmq.conf