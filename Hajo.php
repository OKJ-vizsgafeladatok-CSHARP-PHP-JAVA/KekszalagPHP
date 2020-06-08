<?php


class Hajo {

    private $helyezes;
    private $kategoria;
    private $hajo;
    private $klub;
    private $kormanyos;
    private $nap;
    private $ora;
    private $perc;
    
    function __construct($helyezes, $kategoria, $hajo, $klub, $kormanyos, $nap, $ora, $perc) {
        $this->helyezes = $helyezes;
        $this->kategoria = $kategoria;
        $this->hajo = $hajo;
        $this->klub = $klub;
        $this->kormanyos = $kormanyos;
        $this->nap = $nap;
        $this->ora = $ora;
        $this->perc = $perc;
    }

    function getHelyezes() {
        return $this->helyezes;
    }

    function getKategoria() {
        return $this->kategoria;
    }

    function getHajo() {
        return $this->hajo;
    }

    function getKlub() {
        return $this->klub;
    }

    function getKormanyos() {
        return $this->kormanyos;
    }

    function getNap() {
        return $this->nap;
    }

    function getOra() {
        return $this->ora;
    }

    function getPerc() {
        return $this->perc;
    }

    function setHelyezes($helyezes): void {
        $this->helyezes = $helyezes;
    }

    function setKategoria($kategoria): void {
        $this->kategoria = $kategoria;
    }

    function setHajo($hajo): void {
        $this->hajo = $hajo;
    }

    function setKlub($klub): void {
        $this->klub = $klub;
    }

    function setKormanyos($kormanyos): void {
        $this->kormanyos = $kormanyos;
    }

    function setNap($nap): void {
        $this->nap = $nap;
    }

    function setOra($ora): void {
        $this->ora = $ora;
    }

    function setPerc($perc): void {
        $this->perc = $perc;
    }


}
