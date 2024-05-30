# SCRIPT PER LA CREAZIONE DELLE RICETTE E L'INVIO DELLE RICHIESTE A CHATGPT

def inserisciNuovaRicetta():
    # inserimento dati ricetta
    print("Inserisci i dati della ricetta")
    nome = input("Nome della ricetta: ")
    nome = nome.replace(" ","_")
    ingredienti = []
    while True:
        ingrediente = input("Inserisci un ingrediente (scrivi 't' per terminare): ")
        if ingrediente == "t":
            break
        ingrediente = ingrediente.replace(" ","_")
        ingredienti.append(ingrediente)
    tempo = int(input("Tempo di preparazione: "))
    portata = input("Tipo di portata: ")
    difficolta = int(input("Difficoltà: "))
    vegana = input("Vegana (t/f): ")
    piccante = input("Piccante (t/f): ")
    leggera = input("Leggera (t/f): ")
    senza_glutine = input("Senza glutine (t/f): ")
    stellato = input("Stellato (t/f): ")
    if vegana == "t":
        vegana = 'true'
    else:
        vegana = 'false'
    if piccante == "t":
        piccante = 'true'
    else:
        piccante = 'false'
    if leggera == "t":
        leggera = 'true'
    else:
        leggera = 'false'
    if senza_glutine == "t":
        senza_glutine = 'true'
    else:
        senza_glutine = 'false'
    if stellato == "t":
        stellato = 'true'
    else:
        stellato = 'false'

    # richiesta chat per preparazione
    promptChat = "spiega utilizzando esattamente minimo 600 caratteri e massimo 800 caratteri compresi spazi e punteggiatura, senza fare un introduzione ma solamente parlando della preparazione, e senza iniziare con \"per preparare...\" ma dicendo subito i passaggi da fare, senza usare elenchi ma solo una sequenza di frasi, e senza specificare le dosi in grammi o altre unità di misura ma al massimo specificando i rapporti se necessario, quindi preparazione generica non per n persone specifica, come preparare " + nome + " utilizzando "
    for e in ingredienti:
        promptChat += e + ", "
    promptChat = promptChat[:-2]
    print("\n"+promptChat+"\n")

    descrizione = input("inserisci la descrizione: ")
    descrizione = descrizione.replace("po'","pò")
    descrizione = descrizione.replace("'"," ")

    # Crea formato pronto per sql
    for e in ingredienti:
        stringaIng= "('"+nome+"','"+e+"'),\n"
        listaIngredienti.append(stringaIng)

    stringaRic = "('"+nome+"',"+str(tempo)+",'"+portata+"',"+str(difficolta)+",'"+piccante+"','"+senza_glutine+"','"+vegana+"','"+leggera+"','"+stellato+"','"+descrizione+"'),\n"
    listaRicette.append(stringaRic)


listaIngredienti = []
listaRicette = []
while True:
    inserisciNuovaRicetta()
    continua = input("Vuoi inserire un'altra ricetta? (t/f): ")
    if continua == "f":
        break

# salva nel file txt
f = open("ricette.txt", "a")

for e in listaIngredienti:
    print(e)
    f.write(e)
f.write("\n")
print()
for e in listaRicette:
    print(e)
    f.write(e)
f.close()