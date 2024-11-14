FROM node:22.11

WORKDIR /var/www/

COPY package*.json ./
RUN npm install

COPY . .

EXPOSE 8081

CMD ["npm", "start"]
