FROM nginx:latest
ENV TZ=America/Recife
RUN ln -snf /usr/share/zoneinfo/$TZ /etc/localtime && echo $TZ > /etc/timezone
RUN echo "" > /etc/nginx/conf.d/default.conf
COPY site.conf /etc/nginx/conf.d/