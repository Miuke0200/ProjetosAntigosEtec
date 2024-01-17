
using Sus2.classes;
using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Globalization;
using System.Linq;
using System.Text;
using System.Threading;
using System.Threading.Tasks;
using System.Windows.Forms;

namespace SusCsharp
{

    public partial class Form1 : Form
    {

        String tipo = "";
        int senhaN = 0;
        int senhaP = 0;
        int id = 0;
        DateTime dataEntrada = DateTime.Now;




        public Form1()
        {
            InitializeComponent();

            

        }




        private void EmiteSenha()
        {
            lbSenha.Visible = true;


            lbSenha.Text = Environment.NewLine + "        SENHA" + Environment.NewLine + Environment.NewLine + Environment.NewLine;

            lbSenha.Text += "          " + tipo + id;
            lbSenha.Text += Environment.NewLine + Environment.NewLine + Environment.NewLine + "    " + DateTime.Now.ToString("dd/MM/yyyy");
            lbSenha.Text += Environment.NewLine + "      " + dataEntrada.ToString("H:mm:ss");

            lbSenha.Location = new Point(23, 10);

            for (int y = 1; y < 195; y++)
            {

                Task.Delay(10).Wait();
                lbSenha.Location = new Point(lbSenha.Location.X, lbSenha.Location.Y + 1);

            }

        }
        private void gravaBanco()
        {
            conexao inser = new conexao();

            inser.open();




            int lin = inser.Runsql();

            inser.close();

        }
   
        private void PictureBox3_Click(object sender, EventArgs e)
        {
            tipo = "N";
            EmiteSenha();
        }


        private void AcessoP_Click(object sender, EventArgs e)
        {

            tipo = "P";
            EmiteSenha();
        }


        private void Form1_Load(object sender, EventArgs e)
        {
            Thread.CurrentThread.CurrentCulture = new CultureInfo("pt-BR", false);

            data.Text = dataEntrada.ToString("dd/MM/yyyy\n H:mm:ss");
        }
    }
}
    
        



