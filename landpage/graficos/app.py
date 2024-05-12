import plotly.graph_objs as go
import numpy as np

# Generamos datos aleatorios para el ejemplo
categorias = ['A', 'B', 'C', 'D', 'E']
valores = np.random.randint(1, 100, size=len(categorias))

# Creamos el objeto de gráfico de barras
trace = go.Bar(
    x=categorias,
    y=valores,
    marker=dict(color='rgb(26, 118, 255)'),  # Color de las barras
)

# Creamos el diseño del gráfico
layout = go.Layout(
    title='Ejemplo de Gráfico de Barras',
    xaxis=dict(title='Categorías'),
    yaxis=dict(title='Valores'),
)

# Creamos la figura que contiene el gráfico y el diseño
fig = go.Figure(data=[trace], layout=layout)

# Guardamos el gráfico como un archivo HTML
nombre_archivo = 'grafico_barras.html'
fig.write_html(nombre_archivo)

print(f"Gráfico guardado como '{nombre_archivo}'")
