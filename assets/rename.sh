# vim: ts=2:sw=2:sts=2:expandtab:autoindent:ff=unix:syntax=sh:
echo "rename.sh"
find . -name "*.jpg" | while read f
do
  echo "$f"
  case "$f" in
    *\ *) f2=$(echo "$f" | sed 's/ /_/g')
          mv "$f" "$f2";;
       *) echo "$f does not have spaces";;
  esac
done
