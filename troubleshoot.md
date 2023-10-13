#### Trouble shooting

- `ERROR: Couldn't connect to Docker daemon at http+docker://localunixsocket - is it running?`
    1. Is docker daemon running?
    
            $ sudo systemctl status docker.service
            
    1. Your current unprivileged user must be member of group `docker` in order to start up the docker-compose project.
- Shell remains in MySQL container console.
    1. This is the default and not an issue, but if you want to access the console while the containers are up, you can run docker-compose in detached mode:
    
            $ docker-compose up --detach


