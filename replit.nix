{ pkgs }: {
  deps = [
    pkgs.php83
    pkgs.php83Extensions.mbstring
    pkgs.php83Extensions.fileinfo
  ];
}
