Inscrições Circuito Unifacs App
===============================

### Como contribuir?

#### Passo 1: Fork no projeto Circuitounifacs

![fork projeto](https://github-images.s3.amazonaws.com/help/bootcamp/Bootcamp-Fork.png "Fork projeto")

#### Passo 2: Clone o projeto para sua maquina

$ git clone https://github.com/seuusuario/circuitounifacs.git
Clona seu fork do repositorio no diretorio corrente do terminal

#### Passo 3: Configurar o repositório remoto

Quando um repositorio é clonado, por padrão o repositorio remoto é chamado de origin, porém ele é a origen do seu fork, não do projeto original, para manter o repositorio original você precisa adicionar outro remoto chamado upstream:

$ cd cirtuitounifacs
###### Mudando para o diretorio ativo do projeto clonado "circuitounifacs.git"

$ git remote add upstream https://github.com/goldblade/circuitounifacs.git
###### Adicionado o repositorio original chamado "upstream"

$ git fetch upstream
###### Atualizando as mudanças do repositorio original para o seu local

### Mais coisas que você pode fazer

#### Enviar commits

$ git push origin master
###### Empurra os commits para seu repositorio remoto armazenado no GitHub

#### Atualizando do repositório original "upstream"

$ git fetch upstream
###### Baixa qualquer nova atualização a partir do repositorio original

$ git merge upstream/master
###### Merge qualquer atualização baixada nos seus arquivos de trabalho local

#### Pull requests

![pull requests](http://cl.ly/image/083h2R2P3S2N/pullrequests.png "pull requests")

![novo pull](http://cl.ly/image/253L101x1329/novopull.png "novo pull request")

### Componentes da Equipe

* José Bonifácio
* Eduardo da Penha
* Juan Magalhães
* Adriano Madureira
