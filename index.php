<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<div id="readme" class="Box-body readme blob instapaper_body js-code-block-container">
    <article class="markdown-body entry-content p-5" itemprop="text">
        <h2><a id="user-content-manager-server" class="anchor" aria-hidden="true" href="#manager-server">
                <svg class="octicon octicon-link" viewBox="0 0 16 16" version="1.1" width="16" height="16"
                     aria-hidden="true">
                    <path fill-rule="evenodd"
                          d="M4 9h1v1H4c-1.5 0-3-1.69-3-3.5S2.55 3 4 3h4c1.45 0 3 1.69 3 3.5 0 1.41-.91 2.72-2 3.25V8.59c.58-.45 1-1.27 1-2.09C10 5.22 8.98 4 8 4H4c-.98 0-2 1.22-2 2.5S3 9 4 9zm9-3h-1v1h1c1 0 2 1.22 2 2.5S13.98 12 13 12H9c-.98 0-2-1.22-2-2.5 0-.83.42-1.64 1-2.09V6.25c-1.09.53-2 1.84-2 3.25C6 11.31 7.55 13 9 13h4c1.45 0 3-1.69 3-3.5S14.5 6 13 6z"></path>
                </svg>
            </a>Manager Server
        </h2>
        <h2><a id="user-content-авторизация" class="anchor" aria-hidden="true" href="#авторизация">
                <svg class="octicon octicon-link" viewBox="0 0 16 16" version="1.1" width="16" height="16"
                     aria-hidden="true">
                    <path fill-rule="evenodd"
                          d="M4 9h1v1H4c-1.5 0-3-1.69-3-3.5S2.55 3 4 3h4c1.45 0 3 1.69 3 3.5 0 1.41-.91 2.72-2 3.25V8.59c.58-.45 1-1.27 1-2.09C10 5.22 8.98 4 8 4H4c-.98 0-2 1.22-2 2.5S3 9 4 9zm9-3h-1v1h1c1 0 2 1.22 2 2.5S13.98 12 13 12H9c-.98 0-2-1.22-2-2.5 0-.83.42-1.64 1-2.09V6.25c-1.09.53-2 1.84-2 3.25C6 11.31 7.55 13 9 13h4c1.45 0 3-1.69 3-3.5S14.5 6 13 6z"></path>
                </svg>
            </a>Авторизация.
        </h2>
        <pre><code>    method: post,
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
</code></pre>
        <h2><a id="user-content-проекты" class="anchor" aria-hidden="true" href="#проекты">
                <svg class="octicon octicon-link" viewBox="0 0 16 16" version="1.1" width="16" height="16"
                     aria-hidden="true">
                    <path fill-rule="evenodd"
                          d="M4 9h1v1H4c-1.5 0-3-1.69-3-3.5S2.55 3 4 3h4c1.45 0 3 1.69 3 3.5 0 1.41-.91 2.72-2 3.25V8.59c.58-.45 1-1.27 1-2.09C10 5.22 8.98 4 8 4H4c-.98 0-2 1.22-2 2.5S3 9 4 9zm9-3h-1v1h1c1 0 2 1.22 2 2.5S13.98 12 13 12H9c-.98 0-2-1.22-2-2.5 0-.83.42-1.64 1-2.09V6.25c-1.09.53-2 1.84-2 3.25C6 11.31 7.55 13 9 13h4c1.45 0 3-1.69 3-3.5S14.5 6 13 6z"></path>
                </svg>
            </a>Проекты
        </h2>
        <ul>
            <li>Получение списка проектов пользователя (manager, worker)</li>
        </ul>
        <pre><code>    url:
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
</code></pre>
        <ul>
            <li>Создание проекта (manager)</li>
        </ul>
        <pre><code>    url:
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
</code></pre>
        <ul>
            <li>Подробная информация о проекте (manager, worker)</li>
        </ul>
        <pre><code>     url:
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
</code></pre>
        <h2><a id="user-content-задачи" class="anchor" aria-hidden="true" href="#задачи">
                <svg class="octicon octicon-link" viewBox="0 0 16 16" version="1.1" width="16" height="16"
                     aria-hidden="true">
                    <path fill-rule="evenodd"
                          d="M4 9h1v1H4c-1.5 0-3-1.69-3-3.5S2.55 3 4 3h4c1.45 0 3 1.69 3 3.5 0 1.41-.91 2.72-2 3.25V8.59c.58-.45 1-1.27 1-2.09C10 5.22 8.98 4 8 4H4c-.98 0-2 1.22-2 2.5S3 9 4 9zm9-3h-1v1h1c1 0 2 1.22 2 2.5S13.98 12 13 12H9c-.98 0-2-1.22-2-2.5 0-.83.42-1.64 1-2.09V6.25c-1.09.53-2 1.84-2 3.25C6 11.31 7.55 13 9 13h4c1.45 0 3-1.69 3-3.5S14.5 6 13 6z"></path>
                </svg>
            </a>Задачи
        </h2>
        <ul>
            <li>Получение списка задач проекта (manager, worker)</li>
        </ul>
        <pre><code>    url:
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
</code></pre>
        <ul>
            <li>Создание задачи (manager)</li>
        </ul>
        <pre><code>    url:
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
</code></pre>
        <ul>
            <li>Подробная информация о задаче (manager, worker)</li>
        </ul>
        <pre><code>    url:
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
</code></pre>
        <h2><a id="user-content-комментарий" class="anchor" aria-hidden="true" href="#комментарий">
                <svg class="octicon octicon-link" viewBox="0 0 16 16" version="1.1" width="16" height="16"
                     aria-hidden="true">
                    <path fill-rule="evenodd"
                          d="M4 9h1v1H4c-1.5 0-3-1.69-3-3.5S2.55 3 4 3h4c1.45 0 3 1.69 3 3.5 0 1.41-.91 2.72-2 3.25V8.59c.58-.45 1-1.27 1-2.09C10 5.22 8.98 4 8 4H4c-.98 0-2 1.22-2 2.5S3 9 4 9zm9-3h-1v1h1c1 0 2 1.22 2 2.5S13.98 12 13 12H9c-.98 0-2-1.22-2-2.5 0-.83.42-1.64 1-2.09V6.25c-1.09.53-2 1.84-2 3.25C6 11.31 7.55 13 9 13h4c1.45 0 3-1.69 3-3.5S14.5 6 13 6z"></path>
                </svg>
            </a>Комментарий
        </h2>
        <ul>
            <li>Получение списка комментарьев задачи (manager, worker)</li>
        </ul>
        <pre><code>    url:
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
</code></pre>
        <ul>
            <li>Создание комментария (manager)</li>
        </ul>
        <pre><code>    url:
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
</code></pre>
        <h2><a id="user-content-примечание" class="anchor" aria-hidden="true" href="#примечание">
                <svg class="octicon octicon-link" viewBox="0 0 16 16" version="1.1" width="16" height="16"
                     aria-hidden="true">
                    <path fill-rule="evenodd"
                          d="M4 9h1v1H4c-1.5 0-3-1.69-3-3.5S2.55 3 4 3h4c1.45 0 3 1.69 3 3.5 0 1.41-.91 2.72-2 3.25V8.59c.58-.45 1-1.27 1-2.09C10 5.22 8.98 4 8 4H4c-.98 0-2 1.22-2 2.5S3 9 4 9zm9-3h-1v1h1c1 0 2 1.22 2 2.5S13.98 12 13 12H9c-.98 0-2-1.22-2-2.5 0-.83.42-1.64 1-2.09V6.25c-1.09.53-2 1.84-2 3.25C6 11.31 7.55 13 9 13h4c1.45 0 3-1.69 3-3.5S14.5 6 13 6z"></path>
                </svg>
            </a>Примечание
        </h2>
        <ul>
            <li>При отсутствии права на создание, просмотр или редактирование выдаётся ошибка 403 (Forbidden)</li>
        </ul>
        <pre><code>    error(403):{
        status: false,
        message: {
            permission: "Нет прав"
        }
    }
</code></pre>
        <ul>
            <li>При любом запросе, кроме авторизации, требуется token, при отсутствии выдаётся ошибка
                404(Unauthorized)
            </li>
        </ul>
        <pre><code>    error(403):{
        status: false,
        message: {
            auth: "Unauthorized"
        }
    }
</code></pre>
        <p>##Все может сломатся, будут ошибки пишите в телеграмм!!!</p>
    </article>
</div>
</body>
</html>