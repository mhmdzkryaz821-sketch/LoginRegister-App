IMAGE = login-register-app
NAME  = my-login-container

build:
	docker build -t $(IMAGE) .

run:
	docker run -d -p 8080:80 --name $(NAME) $(IMAGE)

stop:
	docker stop $(NAME)
	docker rm $(NAME)