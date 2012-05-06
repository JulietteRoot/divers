#
# ~/.bashrc
#

# If not running interactively, don't do anything
[[ $- != *i* ]] && return

alias ls='ls --color=auto'
alias ll='ls -lh'
alias rm='rm --preserve-root'
#PS1='
#         (__)
#         (oo) 
#   /------\/ 
#  / |    ||   
# *  /\---/\ 
#    ~~   ~~  
#[\u@\h \W]\$ '
PS1='[\u@\h \W]\$ '
export EDITOR=vim
export PATH=$PATH:~/scripts
