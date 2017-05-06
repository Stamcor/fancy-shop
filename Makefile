EXT = md
SRC = $(wildcard *.$(EXT))

OPTS = --listings

PDF=$(SRC:.md=.pdf)
TEX=$(SRC:.md=.tex)

default:	$(PDF)

all:	$(PDF) $(TEX)

pdf:	clean $(PDF)
tex:	clean $(TEX)

%.tex:	%.md
	pandoc $< -o $@ --template=eisvogel $(OPTS)

%.pdf:	%.md
	pandoc $< -o $@ --template=eisvogel $(OPTS)

clean:
	rm -f *.pdf *.tex

