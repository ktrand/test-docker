FROM node:18 as builder

WORKDIR /var/www/frontend

COPY ./frontend/package*.json ./

RUN npm install

COPY ./frontend/ .

RUN npm run build

RUN ls -la dist/

CMD ["tail", "-f", "/dev/null"]
