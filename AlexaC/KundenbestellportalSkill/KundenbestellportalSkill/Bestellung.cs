namespace KundenbestellportalSkill
{
    public  class Bestellung
    {
        public string Bezeichnung { get; set; }
        public int MengeProVpe { get; set; }
        public double Preis { get; set; }

        public Bestellung(string bezeichnung, int mengeProVpe, double preis)
        {
            Bezeichnung = bezeichnung;
            MengeProVpe = mengeProVpe;
            Preis = preis;
        }

    }
}