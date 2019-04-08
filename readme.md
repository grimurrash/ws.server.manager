
## Manager Server


## Авторизация.


    method: post,
    data: { 
        login, 
        password 
    },
    result: {
        successful(200): {
            status: true,
            token
        },
        error(404): {
            status: false,
            message: []
        }
    }
    
## Проекты

- Получение списка проектов пользователя (manager, worker)


     url: 
     method: get,
     token: required,
     result: {
        successful(200): {
            status: true,
            projects : []
        },
        error(400, 404): {
            status: false,
            message: []
        }
    }
    
- Создание проекта (manager)



     url:
     method: post,
     data:{
        name,
        description
     },
     token: required,
     result: {
        successful(200): {
            status: true,
            id : project_id
        },
        error(400, 404): {
            status: false,
            message: []
        }
    }
    
    
- Подробная информация о проекте (manager, worker)



     url:
     method: get
     token: required
     result: {
        successful(200): {
            status: true,
            project : {
                id, 
                name, 
                manager, 
                workers: [], 
                tasks: [], 
                date
            }
        },
        error(400, 404): {
            status: false,
            message: []
        }
    }


## Задачи

- Получение списка задач проекта (manager, worker)



     url: 
     method: get,
     token: required,
     result: {
        successful(200): {
            status: true,
            tasks : []
        },
        error(400, 404): {
            status: false,
            message: []
        }
    }
    
    
- Создание задачи (manager)



     url:
     method: post,
     data:{
        text,
        worker_id
     },
     token: required,
     result: {
        successful(200): {
            status: true,
            id : task_id
        },
        error(400, 404): {
            status: false,
            message: []
        }
    }
    
    
- Подробная информация о задаче (manager, worker)



     url:
     method: get
     token: required
     result: {
        successful(200): {
            status: true,
            task : {
                id, 
                text, 
                worker, 
                comments: [], 
                date
            }
        },
        error(400, 404): {
            status: false,
            message: []
        }
    }


## Комментарий

- Получение списка комментарьев задачи (manager, worker)



     url: 
     method: get,
     token: required,
     result: {
        successful(200): {
            status: true,
            comments : []
        },
        error(400, 404): {
            status: false,
            message: []
        }
    }
    
    
- Создание комментария (manager)



     url:
     method: post,
     data:{
        comment,
     },
     token: required,
     result: {
        successful(200): {
            status: true,
        },
        error(400, 404): {
            status: false,
            message: []
        }
    }


## Примечание

- При отсутствии права на создание, просмотр или редактирование выдаётся ошибка 403 (Forbidden)

    
    
    error(403):{
        status: false,
        message: {
            permission: "Нет прав"
        }
    }
    
    
- При любом запросе, кроме авторизации, требуется token, при отсутствии выдаётся ошибка 404(Unauthorized)

    
    
    error(403):{
        status: false,
        message: {
            auth: "Unauthorized"
        }
    }
    
    
##Все может сломатся, будут ошибки пишите в телеграмм!!!
