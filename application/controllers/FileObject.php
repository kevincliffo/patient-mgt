<?php
    class FileObject {
    
        private $Name;
        private $Url;
        private $IsFile;
        private $IsDir;
        private $Extension;
        private $IconClass;
        private $IconColour;
        private $LastModifiedTime;
        private $Size;

        public function getName(){
            return $this->Name;
        }
        public function setName($Name){
            $this->Name = $Name;
        }

        public function getUrl(){
            return $this->Url;
        }
        public function setUrl($Url){
            $this->Url = $Url;
        }

        public function getIsFile(){
            return $this->IsFile;
        }
        public function setIsFile($IsFile){
            $this->IsFile = $IsFile;
        }

        public function getIsDir(){
            return $this->IsDir;
        }
        public function setIsDir($IsDir){
            $this->IsDir = $IsDir;
        }

        public function getExtension(){
            return $this->Extension;
        }
        public function setExtension($Extension){
            $this->Extension = $Extension;
        }

        public function getIconClass(){
            return $this->IconClass;
        }
        public function setIconClass($IconClass){
            $this->IconClass = $IconClass;
        }

        public function getIconColour(){
            return $this->IconColour;
        }
        public function setIconColour($IconColour){
            $this->IconColour = $IconColour;
        }

        public function getLastModifiedTime(){
            return $this->LastModifiedTime;
        }
        public function setLastModifiedTime($LastModifiedTime){
            $this->LastModifiedTime = $LastModifiedTime;
        }
        
        public function getSize(){
            return $this->Size;
        }
        public function setSize($Size){
            $this->Size = $Size;
        }
    }
?>