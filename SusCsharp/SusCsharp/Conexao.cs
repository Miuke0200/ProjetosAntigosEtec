
using MySql.Data.MySqlClient;
using System;
using System.Collections.Generic;
using System.Data;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Sus2.classes
{
    class conexao
    {


        public string sql = "";

        MySqlConnection conecta = new MySqlConnection();

        public int Runsql()
        {
            int nrlinhas;
            try
            {

                MySqlCommand comando = new MySqlCommand();
                comando.CommandText = sql;
                comando.Connection = conecta;

                nrlinhas = comando.ExecuteNonQuery();

            }
            catch
            {
                nrlinhas = 0;
            }

            return nrlinhas;
        }

        public MySqlDataReader Execsql(string sql)
        {
            MySqlDataReader dados = null;
            MySqlCommand comando = new MySqlCommand();
            comando.CommandText = sql;
            comando.Connection = conecta;

            dados = comando.ExecuteReader();

            return dados;
        }

        public int ExecEscalar()
        {

            Int32 conta = 0;

            try
            {

                MySqlCommand comando = new MySqlCommand();
                comando.CommandText = sql;
                comando.Connection = conecta;

                conta = (Int32)comando.ExecuteScalar();
            }
            catch
            {
                conta = 0;
            }
            return conta;
        }

        public void open()
        {
            if (conecta.State == ConnectionState.Closed)
            {
                conecta.ConnectionString =
                 ("Server=carmine;Database=2DSA_pedro_sus;User=aluno;Pwd=etec@147");
                conecta.Open();
            }
        }

        public void close()
        {
            if (conecta.State == ConnectionState.Open)
            {
                conecta.Close();
            }
        }



    }
}


