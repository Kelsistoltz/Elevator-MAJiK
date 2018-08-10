IDIR =../include
LDIR =-L/usr/lib/arm-linux-gnueabihf
CC=g++
CFLAGS=-I$(IDIR)
ODIR=obj

LIBS=-l:libmysqlcppconn.so -lpcan

_OBJ = main.o mainFunctions.o pcanFunctions.o databaseFunctions.o
OBJ = $(patsubst %,$(ODIR)/%,$(_OBJ))

$(ODIR)/%.o: %.cpp
	$(CC) -c -o $@ $< $(CFLAGS)

main: $(OBJ)
	g++ -o $@ $^ $(CFLAGS) $(LDIR) $(LIBS)

.PHONY: clean

clean:
	rm -f $(ODIR)/*.o *~ core $(INCDIR)/*~
