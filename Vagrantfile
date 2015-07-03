# -*- mode: ruby -*-
# vi: set ft=ruby :

Vagrant.configure("2") do |config|

  config.vm.box = "scotch/box"
  config.vm.network "private_network", ip: "192.168.33.12"
  config.vm.network :forwarded_port, host: 80, guest: 80
  config.vm.network :forwarded_port, guest: 1080, host: 1080
  config.vm.network :forwarded_port, guest: 1081, host: 1081
  config.vm.network :forwarded_port, guest: 6379, host: 6379
  config.ssh.password = "vagrant"
  config.ssh.username = "vagrant"
  config.ssh.insert_key = "true"

  config.vm.synced_folder ".", "/var/www", type:"nfs"
  config.vm.provision :shell, path: "Vagrant.bootstrap.sh"

  config.vm.provider :virtualbox do |v|
    v.gui = true
    v.memory = 1455
    v.cpus = 2
  end

  config.vm.hostname = "local.endouble-insights.com"
  config.hostmanager.enabled = true
  config.hostmanager.manage_host = true
  config.hostmanager.ignore_private_ip = false
  config.hostmanager.include_offline = true
  config.vm.define 'scotchbox' do |node|
    node.vm.hostname = 'local.cminor.io'
    node.vm.network :private_network, ip: '192.168.33.12'
    node.hostmanager.aliases = %w(www.local.endouble-insights.com local.endouble-insights.com)
  end

end
